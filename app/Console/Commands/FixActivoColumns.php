<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixActivoColumns extends Command
{
    protected $signature = 'fix:activo-columns';
    protected $description = 'Add activo column to maestra tables';

    public function handle()
    {
        $tables = ['executives', 'directores', 'lineas', 'codigos'];

        foreach ($tables as $table) {
            $columns = DB::select("SHOW COLUMNS FROM {$table}");
            $hasActivo = collect($columns)->contains('Field', 'activo');

            if (!$hasActivo) {
                DB::statement("ALTER TABLE {$table} ADD COLUMN activo tinyint(1) NOT NULL DEFAULT 1");
                $this->info("Added activo column to {$table}");
            } else {
                $this->info("Column activo already exists in {$table}");
            }
        }
    }
}