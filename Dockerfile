# Copyright (c) 2026 Semillero de Investigación en Recursos Educativos Digitales Abiertos

# Este Dockerfile utiliza multistage build para optimizar el tamaño final de la imagen.
# La imagen final será significativamente más pequeña que una construcción de etapa única.

# ============================================================================
# STAGE 1: Builder - Instala todas las dependencias de desarrollo
# ============================================================================
FROM php:8.5-apache-trixie as builder

# Descargamos las librerias requeridas para la construcción
RUN apt update && apt install -y --no-install-recommends \
    locales \
    openssl \
    git \
    wget \
    curl \
    zip \
    unzip

# Configuramos las extensiones de PHP
RUN curl -sSLf \
        -o /usr/local/bin/install-php-extensions \
        https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions
RUN install-php-extensions zip xml mysqli gd iconv pdo_mysql

# Instalamos Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalamos Node usando el package manager de Debian en lugar de nvm
RUN apt update
RUN apt install -y --no-install-recommends nodejs npm

# Generar localización
RUN locale-gen es_CO.UTF-8 en_US.UTF-8

# Asignar zona horaria
RUN ln -sf /usr/share/zoneinfo/America/Bogota /etc/localtime

# ============================================================================
# STAGE 2: Production - Imagen final optimizada
# ============================================================================
FROM php:8.5-apache-trixie as production

# Instalar solo las dependencias de runtime necesarias
RUN apt update && apt install -y --no-install-recommends \
    locales \
    openssl \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Copiar las extensiones PHP del builder
COPY --from=builder /usr/local/bin/install-php-extensions /usr/local/bin/install-php-extensions
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions zip xml mysqli gd iconv pdo_mysql

# Copiar Composer y Node desde el builder
COPY --from=builder /usr/local/bin/composer /usr/local/bin/composer
COPY --from=builder /usr/bin/node /usr/bin/node
COPY --from=builder /usr/bin/npm /usr/bin/npm


# Copiar la configuración de localización
COPY --from=builder /etc/locale.gen /etc/locale.gen
RUN locale-gen es_CO.UTF-8 en_US.UTF-8

# Copiar la zona horaria
COPY --from=builder /etc/localtime /etc/localtime

# Copiamos la configuración del sitio
COPY .docker/apache/my-site.conf /etc/apache2/sites-available

# Configuramos Apache
RUN a2enmod rewrite
RUN a2dissite default-ssl my-site 000-default
RUN a2ensite my-site

# Movemos las utilidades al contenedor
COPY .docker/bin/* /tmp/
RUN chmod +x /tmp/* && \
    mv /tmp/* /bin/ 2>/dev/null || true

# Limpiar cache de apt
RUN apt clean && apt autoremove -y

# Cambiar el directorio de trabajo a /var/www
WORKDIR /var/www