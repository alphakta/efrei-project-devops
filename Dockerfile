# Use an official PHP image as a base
FROM php:7.4-apache

# Install required extensions
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-install mysqli \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Copy your PHP application code to the web server document root
COPY . /var/www/html/

# Expose port 80 for the Apache web server
EXPOSE 80
