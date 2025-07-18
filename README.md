
# FormSync

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<h1 align="center">ImpreForms</h1>

<p align="center">
  Sistema de gestión y flujo de formularios/documentación para procesos internos empresariales.
</p>

---

## 📌 Acerca del proyecto

**FormSync** es una aplicación web desarrollada en **Laravel 12** con **Livewire**, **Volt** y **Tailwind CSS**, diseñada para gestionar el proceso de creación, edición, revisión y almacenamiento de **contratos, aprobaciones y formularios empresariales**.

Su propósito es facilitar el flujo de documentación interna, centralizar los adjuntos importantes y mejorar el control de versiones/formularios mediante enlaces únicos y temporales.

---

## ⚙️ Características principales

- 📝 Creación y envío de formularios dinámicos por pasos
- 📁 Subida y gestión de documentos adjuntos (PDF, DOCX, etc.)
- 🔒 Autenticación segura con Laravel Breeze y middleware `auth`
- 🔗 Generación de enlaces únicos para áreas específicas (operaciones y financiera)
- 📂 Almacenamiento de archivos en `storage/app/public/documents`
- 📜 Historial de formularios enviados con opción de edición en modal
- 🧑‍💼 Integración con usuarios/colaboradores internos
- 📬 Notificaciones y sesiones flash amigables

---

## 🚀 Tecnologías utilizadas

- **Laravel 12**
- **Livewire + Volt**
- **Tailwind CSS**
- **Vite** (bundler y recarga en caliente)
- **MySQL** como sistema de base de datos
- **Almacenamiento de archivos vía `storage:link`**
- **uuid** para enlaces únicos por sesión

---

## 📂 Estructura de almacenamiento de archivos

Los documentos adjuntos se guardan en:
storage/app/public/documents/

Y se acceden públicamente desde:
/storage/documents/{archivo}
> ⚠️ Asegúrate de ejecutar `php artisan storage:link` para generar el enlace simbólico correcto.

---

## 📌 Requisitos para ejecutar el proyecto

- PHP 8.2+
- Composer
- MySQL
- Node.js + npm
- Extensiones PHP comunes (`mbstring`, `openssl`, `pdo`, etc.)

---

## 🛠 Instalación rápida

```bash
git clone
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
npm install && npm run dev
php artisan serve

🛡️ Licencia
Este proyecto está licenciado bajo la licencia MIT.

✉️ Contacto
Proyecto interno desarrollado por el área de desarrollo de la empresa.
Para soporte o dudas técnicas, contacta al equipo de tecnología correspondiente.
