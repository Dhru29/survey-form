FROM php:7.4-apache

# Install required packages
RUN apt-get update && \
    apt-get install -y wget gnupg openjdk-11-jdk && \
    wget -q -O - https://pkg.jenkins.io/debian/jenkins.io.key | apt-key add - && \
    sh -c 'echo deb http://pkg.jenkins.io/debian-stable binary/ > /etc/apt/sources.list.d/jenkins.list' && \
    apt-get update && \
    apt-get install -y jenkins && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Enable Apache mods
RUN a2enmod rewrite

# Copy application source
COPY . /var/www/html/

# Install MySQLi extension for PHP
RUN docker-php-ext-install mysqli

# Set web root permissions
RUN chown -R www-data:www-data /var/www/html

# Expose ports
EXPOSE 80 8080

# Start Jenkins and Apache
CMD service jenkins start && apache2-foreground
