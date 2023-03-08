FROM php:7.4-apache
RUN apt-get update && apt-get install -y git && docker-php-ext-install mysqli
WORKDIR /var/www/html/
RUN rm -rf /var/www/html/Be-Primeur && \
    git clone https://gitlab.com/AlphaKeita/Be-Primeur.git /var/www/html/
# COPY ./app /var/www/html/
EXPOSE 80