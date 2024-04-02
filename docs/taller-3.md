# Laravel: eventos, notificaciones vía correo electrónico y configuración para despliegue a productivo

En este tercer y último taller, trabajarás sobre el proyecto anteriormente elaborado en los talleres 1 y 2. 

## En este taller...
* Configura una cuenta para el envío de correos electrónicos en el archivo `.env`.
* Crea una vista plantilla para usar al momento de enviar correos electrónicos.
* Crea un observer sobre el modelo de posts que permita enviar un correo informando del nuevo post.
* Crea y configura un Mailable de Laravel para enviar el correo anteriormente creado.
* Crea un evento que permita capturar cuando un usuario ingresa a un post.
* Crea un handler que permita capturar el evento de cuando un usuario ingresa a un post, aumentando el contador de visitas.
* Configura el proyecto de Laravel para un despliegue productivo.
    * Cambia la configuración del env necesaria para hacer esto.
    * Ejecuta el comando `php artisan optimize`
    * Ejecuta el comando `composer dump-autoload -o`
    