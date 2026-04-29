<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class ActiveDirectoryService
{
    protected string $server = 'ldap://172.16.1.64';
    protected string $baseDn = 'DC=IMPRESISTEM,DC=local';
    protected string $adUser;
    protected string $adPassword;

    protected array $attributes = [
        'displayName',
        'mail',
        'title',
        'department',
        'streetAddress',
        'l',
        'st',
        'postalCode',
        'co',
    ];

    public function __construct()
    {
        $this->adUser = config('services.ad.user', 'IMPRESISTEM\\sebastian.ortiz');
        $this->adPassword = config('services.ad.password', 'Chivas504');
    }

    public function authenticate(string $username, string $password): ?array
    {
        if (empty($username) || empty($password)) {
            return null;
        }

        $ldap = @ldap_connect($this->server);

        if (!$ldap) {
            Log::error('AD: No se pudo conectar al servidor LDAP');
            return null;
        }

        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);

        try {
            $bind = @ldap_bind($ldap, "IMPRESISTEM\\$username", $password);

            if (!$bind) {
                Log::warning("AD: Fallo bind para usuario $username");
                return null;
            }

            $user = $this->getUserByUsername($ldap, $username);

            ldap_unbind($ldap);

            return $user;
        } catch (\Exception $e) {
            Log::error("AD: Error de autenticación - " . $e->getMessage());
            return null;
        }
    }

    public function getUserByUsername($ldap, string $username): ?array
    {
        $searchFilter = "(&(objectClass=user)(objectCategory=person)(sAMAccountName=$username))";

        $result = @ldap_search($ldap, $this->baseDn, $searchFilter, $this->attributes);

        if (!$result || ldap_count_entries($ldap, $result) === 0) {
            return null;
        }

        $entry = ldap_first_entry($ldap, $result);

        if (!$entry) {
            return null;
        }

        return $this->parseEntry($ldap, $entry);
    }

    public function getUserByEmail($ldap, string $email): ?array
    {
        $searchFilter = "(&(objectClass=user)(objectCategory=person)(mail=$email))";

        $result = @ldap_search($ldap, $this->baseDn, $searchFilter, $this->attributes);

        if (!$result || ldap_count_entries($ldap, $result) === 0) {
            return null;
        }

        $entry = ldap_first_entry($ldap, $result);

        if (!$entry) {
            return null;
        }

        return $this->parseEntry($ldap, $entry);
    }

    public function getAllUsers(): array
    {
        $ldap = @ldap_connect($this->server);

        if (!$ldap) {
            return [];
        }

        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);

        $bind = @ldap_bind($ldap, $this->adUser, $this->adPassword);

        if (!$bind) {
            return [];
        }

        $searchFilter = "(&(objectClass=user)(objectCategory=person)(mail=*)(!(userAccountControl:1.2.840.113556.1.4.803:=2)))";

        $result = @ldap_search($ldap, $this->baseDn, $searchFilter, $this->attributes);

        if (!$result) {
            return [];
        }

        $users = [];
        $entry = ldap_first_entry($ldap, $result);

        while ($entry) {
            $users[] = $this->parseEntry($ldap, $entry);
            $entry = ldap_next_entry($ldap, $entry);
        }

        ldap_unbind($ldap);

        return $users;
    }

    protected function parseEntry($ldap, $entry): array
    {
        $getAttribute = function ($ldap, $entry, $name) {
            $values = @ldap_get_values($ldap, $entry, $name);
            return $values ? $values[0] : null;
        };

        $displayName = $getAttribute($ldap, $entry, 'displayName');
        $mail = $getAttribute($ldap, $entry, 'mail');
        $title = $getAttribute($ldap, $entry, 'title');
        $department = $getAttribute($ldap, $entry, 'department');
        $streetAddress = $getAttribute($ldap, $entry, 'streetAddress');
        $city = $getAttribute($ldap, $entry, 'l');
        $state = $getAttribute($ldap, $entry, 'st');

        $direccionComercial = implode(', ', array_filter([
            $streetAddress,
            $city,
            $state,
        ]));

        return [
            'nombre' => $displayName,
            'correo' => $mail,
            'cargo' => $title,
            'area' => $department,
            'direccion_comercial' => $direccionComercial ?: null,
        ];
    }
}