FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    git \
    && docker-php-ext-install mysqli

RUN if [ ! -d "/var/www/html/Be-Primeur" ]; then \
        git clone https://gitlab.com/MON_PROJET.git /var/www/html/Be-Primeur; \
    fi

WORKDIR /var/www/html/Be-Primeur

EXPOSE 80