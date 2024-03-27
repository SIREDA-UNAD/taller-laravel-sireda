# Taller 1 - introducción al funcionamiento básico (por qué usarlo, beneficios, controladores, rutas, vistas, modelos, configuración)

¡Comencemos a usar Laravel!

En el archivo `proyecto.md` encontrarás todos los requerimientos solicitados para realizar este taller de Laravel. En este primer taller, te familiarizarás con Laravel y su funcionamiento general.

## Pasos preliminares

* En la carpeta `src` encontrarás el código fuente que modificarás. Si usas XAMPP, puedes copiar esta carpeta al `htdocs` o, si estás en Linux, a tu `/var/www`. 
    * Recuerda, para que corra tu proyecto de Laravel, deberás de instalar las dependencias de composer usando el comando `composer install`.
* Copia la configuración del archivo `.env.example` al archivo `.env`. Alternativamente, puedes renombrar el archivo `.env.example` a `.env`.
* Cachea la configuración usando el comando `php artisan config:cache && php artisan route:clear`.

## En este taller...
* Configura tu proyecto de Laravel en el archivo `.env`, modificando las siguientes llaves:
    * DB_CONNECTION
    * DB_HOST
    * DB_PORT
    * DB_DATABASE
    * DB_USERNAME
    * DB_PASSWORD
* Implementa las migraciones para las tablas requeridas usando el comando `php artisan make:migration nombre_migracion`.
* Implementa los modelos para las funcionalidades requeridas usando el comando `php artisan make:model nombre_modelo`.
* Implementa los controladores para los modelos anteriormente creados usando el comando `php artisan make:controller nombre_controlador`.
* Implementa las funciones de crear, editar y eliminar en los controladores creados, así como las funciones para ingresar a las vistas correspondientes.
* Crea formularios para llamar las funciones anteriormente creadas.
* Crea rutas para llamar las funciones anteriormente creadas e ingresar.