# Use the official PHP image as the base image
FROM php:apache

# Install Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install Vim
RUN apt-get update && \
    apt-get install -y vim

# Set Xdebug settings
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install additional PHP extensions
RUN docker-php-ext-install mysqli pdo_mysql

COPY ./ /var/www/html/