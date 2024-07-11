# Use the official PHP image with Apache
FROM php:8.1-apache

# Install required PHP extensions and MySQL client
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy PHP backend files to the container
COPY php /var/www/html

# Copy the front-end files to the container
COPY js /var/www/html/js
COPY css /var/www/html/css
COPY html /var/www/html/html
COPY Images /var/www/images

# Expose port 80
EXPOSE 80


# Start Apache in the foreground
CMD ["apache2-foreground"]

