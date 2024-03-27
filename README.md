# Taller de Laravel
## Semillero de Investigación en Recursos Educativos Digitales Abiertos

El propósito de este taller es complementar los conocimientos adquiridos en la serie de talleres de programación orientada a objetos con una introducción al desarrollo web por medio del framework Laravel. Sientete libre de clonar este repositorio

### ¿Qué encontrarás en este repositorio?

Por cada taller realizado, se existirá una rama que permita compartir con los asistentes del taller ciertos conocimientos nuevos.


| taller-1                                                                                                                          | taller-2                                                                        | taller-3                                                                                             |
|-----------------------------------------------------------------------------------------------------------------------------------|---------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------|
| Laravel: introducción al funcionamiento básico (por qué usarlo, beneficios, controladores, rutas, vistas, modelos, configuración) | Laravel: middlewares, reglas de validaciones, relaciones de modelos en Eloquent | Laravel: eventos, notificaciones vía correo electrónico y configuración para despliegue a productivo |

Encontrarás las instrucciones de cada taller en la carpeta `docs`, así como las extensiones recomendadas para Visual Studio Code al trabajar con Laravel.

### Instrucciones de instalación

También puedes descargar un servidor web con todo integrado, con XAMPP (https://www.apachefriends.org/es/download.html), es posible tener todos los elementos requeridos para poder realizar los talleres.

Adicionalmente, es necesario descagar Composer, el cual puedes descargar del siguiente sitio
* Windows: https://getcomposer.org/doc/00-intro.md#installation-windows
* Linux y macOS: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos (Se requiere realizar la instalación con PHP)


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
