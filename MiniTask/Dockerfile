FROM php:8.2-apache

# Abilita mod_rewrite (se serve)
RUN a2enmod rewrite

# Copia il progetto nella directory di Apache
COPY . /var/www/html/

# Rende la directory scrivibile (per file JSON)
RUN chown -R www-data:www-data /var/www/html/data