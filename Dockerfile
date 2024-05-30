# Use the base image php:8.3-rc-apache
FROM php:8.3-rc-apache

# Update package list and install the PDO MySQL extension
RUN apt-get update && docker-php-ext-install pdo_mysql

# Copy the application code to the web root directory
COPY . /var/www/html/
