# Copyright (c) 2024 Semillero de Investigación en Recursos Educativos Digitales Abiertos

# Este Dockerfile permite crear un servidor Apache general. Puedes tomar este Dockerfile para crear
# uno más complejo, o alistarlo para ambientes productivos.

# Descargamos PHP con Apache
FROM php:apache-bullseye

# Descargamos las librerias requeridas para continuar.
RUN apt update && apt install -y \
    locales \
    openssl \
    git \
    wget \
    curl \
    nano \
    zip \
    unzip \
    p7zip

# Configuramos las extensiones de PHP
RUN curl -sSLf \
        -o /usr/local/bin/install-php-extensions \
        https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions /usr/local/bin/install-php-extensions
RUN install-php-extensions zip xml mysqli gd iconv pdo_mysql

# Copiamos la configuración del sitio.
COPY .docker/apache/my-site.conf /etc/apache2/sites-available

# Instalamos Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalamos Node
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash #yeha
RUN echo "source ~/.nvm/nvm.sh && \
    nvm install --lts && \
    nvm use --lts" | bash

# Generar localización
RUN locale-gen es_CO.UTF-8 en_US.UTF-8

# Asignar zona horaria
RUN ln -sf /usr/share/zoneinfo/America/Bogota /etc/localtime

# Configuramos Apache
RUN a2enmod rewrite
RUN a2dissite default-ssl my-site 000-default
RUN a2ensite my-site

# Movemos las utilidades al contenedor
COPY .docker/bin/* /tmp
RUN chmod +x /tmp/*
RUN mv /tmp/* /bin

# Limpiar cache de apt y remover paquetes innecesarios.
RUN apt clean && apt autoremove

# Cambiar el directorio de trabajo a /var/www
WORKDIR /var/www