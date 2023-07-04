FROM php:8.2-apache

WORKDIR /var/www/
COPY src/ /var/www/html/

RUN a2enmod rewrite