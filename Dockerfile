# Copyright (c) 2024 Semillero de Investigación en Recursos Educativos Digitales Abiertos

# Descargamos PHP con FPM
FROM php:fpm-bullseye

# Descargamos las librerias requeridas para continuar.
RUN apt update && apt install -y \
    git \
    apache2 \
    wget \
    curl \
    nano

# Configuramos las extensiones de PHP
RUN curl -sSLf \
        -o /usr/local/bin/install-php-extensions \
        https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions /usr/local/bin/install-php-extensions
RUN install-php-extensions zip xml mysqli gd iconv

# Copiamos la configuración del sitio.
COPY .docker/apache/my-site.conf /etc/apache2/sites-available

# Instalamos Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configuramos Apache
RUN a2enmod rewrite
RUN a2dissite default-ssl my-site 000-default
RUN a2ensite my-site

# Cambiar el directorio de trabajo a /var/www
WORKDIR /var/www

# Ajustar usuario del contenedor
RUN useradd -m local
RUN usermod -aG www-data local

RUN chown local:local -R /var/www

USER local