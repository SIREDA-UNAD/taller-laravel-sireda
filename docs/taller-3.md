# Laravel: eventos, notificaciones vía correo electrónico y configuración para despliegue a productivo

En este tercer y último taller, trabajarás sobre el proyecto anteriormente elaborado en los talleres 1 y 2. 

## En este taller...
* Configura una cuenta para el envío de correos electrónicos en el archivo `.env`.
* Crea una vista plantilla para usar al momento de enviar correos electrónicos.
* Crea una vista con la información de la última compra realizada por el cliente.
* Crea un observer sobre el modelo de ventas que permita enviar un correo con la información de la venta.
* Crea y configura un Mailable de Laravel para enviar un correo con la información de la venta.
* Configura el proyecto de Laravel para un despliegue productivo.
    * Cambia la configuración del env necesaria para hacer esto.
    * Ejecuta el comando `php artisan optimize`
    * Ejecuta el comando `composer dump-autoload -o`
    