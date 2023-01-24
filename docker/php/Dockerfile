FROM php:8.1.1-apache
COPY php.ini /usr/local/etc/php/
RUN apt-get update && \
    docker-php-ext-install sockets