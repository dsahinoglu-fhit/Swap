FROM php:8.3-apache
RUN apt-get update &&  \
    apt-get install -y curl libpng-dev libonig-dev libxml2-dev zip unzip libwebp-dev && \
    docker-php-ext-configure gd --with-webp  && \
    docker-php-ext-install gd && \
    docker-php-ext-install opcache
RUN echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini;