FROM php:7.4-apache
RUN apt-get update && apt-get install -y git && \
    docker-php-ext-install mysqli
WORKDIR /var/www/html/
RUN rm -rf /var/www/html/Be-Primeur && \
    git clone https://github.com/votre-nom-d-utilisateur/Be-Primeur.git /var/www/html/
EXPOSE 80