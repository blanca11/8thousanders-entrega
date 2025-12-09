# 8thousanders – Proyecto Laravel + Docker (Laravel Sail)

Este proyecto ha sido desarrollado utilizando **Laravel 11**, ejecutado mediante **Laravel Sail**, el entorno oficial de Docker para Laravel.  
Este README explica exactamente cómo levantar el proyecto y probar todas sus funcionalidades en cualquier entorno desde cero.

---

## Tecnologías utilizadas

- **Laravel 11**
- **Laravel Sail** (Docker)
- **PHP 8.4**
- **MySQL 8**
- **Composer**
- **Node.js + Vite**
- **Docker & Docker Compose**

---

## Puesta en marcha del proyecto

Sigue estos pasos para instalar y ejecutar el proyecto desde cero usando Docker + Sail.

---

1️. Clonar el repositorio
```bash
git clone https://github.com/blanca11/8thousanders-entrega.git
cd 8thousanders-entrega

2. Crear el archivo .env
cp .env.example .env

3. Instalar dependencias de Composer mediante Sail
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd)":/var/www/html \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install

4. Levantar los contenedores
./vendor/bin/sail up -d

5. Generar la clave de la aplicación
./vendor/bin/sail php artisan key:generate

6. Ejecutar migraciones y seeders
./vendor/bin/sail php artisan migrate --seed

7. Instalar dependencias de Node:
./vendor/bin/sail npm install

8. Levantar Vite en modo desarrollo
./vendor/bin/sail npm run dev

9. Acceder a la aplicación
Abrir http://localhost en el navegador

Base de datos (MySQL):
Configuración utilizada por Sail, definida en .env:
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=8thousanders
DB_USERNAME=sail
DB_PASSWORD=password

Usuario de prueba administrador:
Email: dsn.blanca@gmail.com
Contraseña: 12345678

Comandos útiles de Laravel Sail:
./vendor/bin/sail up -d -> encender los contenedores
./vendor/bin/sail down -> apagar los contenedores










