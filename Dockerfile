FROM php:8.2-apache

WORKDIR /var/www/
COPY src/ /var/www/html/

RUN apt-get update \
    && apt-get upgrade -y

RUN a2enmod rewrite