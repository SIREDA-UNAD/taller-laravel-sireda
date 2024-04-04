# Taller de Laravel
## Semillero de Investigación en Recursos Educativos Digitales Abiertos

El propósito de este taller es complementar los conocimientos adquiridos en la serie de talleres de programación orientada a objetos con una introducción al desarrollo web por medio del framework Laravel. Sientete libre de clonar este repositorio.

### ¿Qué encontrarás en este repositorio?

En la carpeta docs, encontrarás los archivos Markdown que contendrán la información relacionada al taller que se está realizando, así como las instrucciones para alcanzar tus objetivos.

| taller-1                                                                                                                          | taller-2                                                                        | taller-3                                                                                             |
|-----------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------|
| Laravel: introducción al funcionamiento básico (por qué usarlo, beneficios, controladores, rutas, vistas, modelos, configuración) | Laravel: middlewares, reglas de validaciones, relaciones de modelos en Eloquent | Laravel: eventos, notificaciones vía correo electrónico y configuración para despliegue a productivo |

También, si usas Visual Studio Code, tendrás las extensiones recomendadas para trabajar con Laravel.

### Instrucciones de instalación

#### XAMPP

Puedes descargar un servidor web con todo integrado, con XAMPP (https://www.apachefriends.org/es/download.html), es posible tener todos los elementos requeridos para poder realizar los talleres. Este paquete ya contiene:
* Un servidor Apache.
* MariaDB
* Lenguaje de programación PHP.
* Lenguaje de programación Perl.

Adicionalmente, es necesario descargar Composer, el cual puedes descargar del siguiente sitio
* Windows: https://getcomposer.org/doc/00-intro.md#installation-windows
* Linux y macOS: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos (Se requiere realizar la instalación con PHP)


#### Docker

Alternativamente puedes usar el docker-compose.yml y el Dockerfile proveídos en el repositorio para arrancar un entorno de desarrollo con todo configurado.

Para usar la opción de descarga de Docker usando Docker Desktop, debes de contar con:
* Virtualización activa en la BIOS.
* 4 GB de RAM mínimo.
* Sistema operativo:
    * Windows 10 (19045 o superior) u 11 (21H2 o superior) - https://docs.docker.com/desktop/install/windows-install/
        * Se requiere tener virtualización por Hyper-V activa, o alternativamente, habilitar Windows Subsystem for Linux 2. Ambos se pueden habilitar en "Activar o desactivar características de Windows"
    * macOS Ventura (13) o Sonoma (14) - https://docs.docker.com/desktop/install/mac-install/
    * Linux - https://docs.docker.com/desktop/install/linux-install/
        * Alternativamente, puedes usar la línea de comandos para obtener 

Para ejecutar ejecutar el servidor web, usa el comando `docker compose up`.
* El servidor web se ejecutará en el puerto 80 (http://localhost:80).
* Puedes ingresar a phpMyAdmin en el puerto 8080 (http://localhost:8080).
* MariaDB tiene habilitado el puerto 3306, el por defecto.