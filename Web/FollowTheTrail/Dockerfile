FROM php:7.4-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

COPY ./private/styles.css /var/www/html
COPY ./private/index.php /var/www/html
COPY ./private/background.jpg /var/www/html
