# 🚀 Proyecto Laravel Api Base

Sistema desarrollado en Laravel para gestion de usuarios , permisos y roles mediante api

Este repositorio contiene el backend para la gestion de api mediante autentificacion jwt , roles y permisos para los usuarios los cruds para los catalagos mencionados
---

## 📋 Requisitos previos

Antes de comenzar, asegúrate de contar con lo siguiente instalado en tu equipo:

- PHP compatible con Laravel
- Composer
- MySQL activo

---

## ⚙️ Instalación

### 1️⃣ Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/tu-repositorio.git
cd tu-repositorio


2️⃣ Instalar dependencias
composer install

3️⃣ Archivo .env

APP_NAME=api
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost
APP_LOCALE=es

4️⃣ Generar la clave de la aplicación
php artisan key:generate
Generar una clave secreta php artisan jwt:secret

 Configura tu conexión a MySQL en el archivo .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=repsa_app
DB_USERNAME=root
DB_PASSWORD=

Ejecuta las migraciones junto con los seeders:
php artisan migrate --seed

