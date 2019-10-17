FROM php:7.3-fpm
USER root

# Configuration setup
RUN apt-get update
RUN apt-get install -y wget zip unzip libzip-dev
RUN docker-php-ext-install zip
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ./Docker/php/conf/php-fpm.conf /usr/local/etc/php-fpm.d/zzz-app-fpm.conf
COPY ./Docker/php/conf/php.ini /usr/local/etc/php/conf.d/app-php.ini

# Copy codebase
ADD ./app/ /app/
WORKDIR /app/
RUN mkdir -p /app/var/cache
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --optimize-autoloader --no-scripts --no-plugins
COPY ./Docker/php/entrypoint.sh /entrypoint.sh
RUN ["chmod", "+x", "/entrypoint.sh"]
