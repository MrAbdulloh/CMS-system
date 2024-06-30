FROM php:8.0-fpm

# Install mysqli extension

# RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html