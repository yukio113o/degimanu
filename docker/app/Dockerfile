FROM php:7.3-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libpq-dev \
        libzip-dev \
    && docker-php-ext-install pdo_mysql pdo zip\
    && docker-php-ext-install opcache

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN composer self-update

COPY conf.d/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
WORKDIR /var/www/html
