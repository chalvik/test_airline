# Main image
FROM php:7.3-fpm
# Author
MAINTAINER Ilichev Sergey <sergey.my.activity@gmail.com>

# Workdir for php - хер знает зачем
WORKDIR /var/www/code

# Update and install modules for php and other
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y --no-install-recommends \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libpq-dev \
        libxml2-dev \
        libmcrypt-dev \
        libzip-dev \
    && pecl install xdebug \
    && apt-get install -y wget zip unzip \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) zip gd pdo pdo_mysql pdo_pgsql mbstring xml pcntl\
    && docker-php-ext-enable xdebug

RUN apt-get update && apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
RUN printf "\n" | pecl install imagick
RUN docker-php-ext-enable imagick


# Install composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install git
# RUN apt-get install -y git

# Install phpunit
RUN wget https://phar.phpunit.de/phpunit-6.5.phar \
    && chmod +x phpunit-6.5.phar \
    && mv phpunit-6.5.phar /usr/local/bin/phpunit


# Install codecept
RUN wget http://codeception.com/codecept.phar \
    && chmod +x codecept.phar \
    && mv codecept.phar /usr/local/bin/codecept

# clean apt
RUN rm -rf /var/lib/apt/lists/*

# Add custom php.ini
COPY ./config/ /usr/local/etc/php

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

WORKDIR /var/www/code

# Run container
# The main purpose of a CMD is to provide defaults for an executing container. These defaults can include an executable,
# or they can omit the executable, in which case you must specify an ENTRYPOINT instruction as well.
CMD ["php-fpm"]