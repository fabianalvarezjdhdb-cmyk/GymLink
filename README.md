GymLink - Sistema de Gestión de Gimnasios
Aplicación web desarrollada en Laravel orientada a la optimización de procesos administrativos, control de clientes y gestión integral para establecimientos de acondicionamiento físico.

Características Principales
Módulo de Autenticación y Registro: Control de accesos de usuarios con encriptación segura de contraseñas (Hash).

Gestión de Base de Datos: Integración con MySQL mediante ORM Eloquent para consultas y persistencia eficiente.

Control de Sesiones: Manejo estructurado de sesiones de usuario con soporte robusto de base de datos.

Interfaz Adaptativa: Vistas de acceso ágiles estructuradas con Blade templates.

Tecnologías Utilizadas
Backend: PHP 8.2+ con framework Laravel 12.

Base de Datos: MySQL (gestionado a través de XAMPP / phpMyAdmin).

Control de Versiones: Git y GitHub.

Requisitos del Sistema
PHP versión 8.2 o superior.

Composer instalado globalmente.

Servidor local compatible con MySQL (XAMPP, Laragon o similar).

Instalación y Configuración Local
Sigue estos pasos para clonar y poner en marcha el proyecto en tu entorno local:

Clonar el repositorio:

Bash
git clone https://github.com/fabianalvarezjdhdb-cmyk/GymLink.git
cd GymLink
Instalar las dependencias de PHP:

Bash
composer install
Configurar el entorno:
Duplica el archivo de configuración de ejemplo y ajusta los parámetros de tu base de datos:

Bash
cp .env.example .env
Genera la llave de la aplicación:

Bash
php artisan key:generate
Configurar la Base de Datos:
Abre tu archivo .env y define los accesos hacia tu servidor MySQL local:

Fragmento de código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gymlink
DB_USERNAME=root
DB_PASSWORD=
Ejecutar Migraciones:
Crea y sincroniza las tablas requeridas (incluyendo control de sesiones y usuarios) en tu base de datos:

Bash
php artisan migrate
Iniciar el Servidor de Desarrollo:

Bash
php artisan serve
Accede a [http://127.0.0.1:8000](http://127.0.0.1:8000) en tu navegador web.

Autor
Desarrollado por Daniel Zubieta como parte del programa de formación en Análisis y Desarrollo de Software.
Desarrollado por Fabián Álvarez como parte del programa de formación en Análisis y Desarrollo de Software.

