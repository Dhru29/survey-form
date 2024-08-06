# Use the official PHP image with Apache
FROM php:7.4-apache

# Copy application files to the Apache web directory
COPY . /var/www/html/

# Install MySQLi extension for PHP
RUN docker-php-ext-install mysqli

# Provide write permissions to the Apache web directory
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 for Apache
EXPOSE 80
