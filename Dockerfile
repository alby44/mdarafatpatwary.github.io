# Dockerfile
FROM php:apache

# Install MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy application files
COPY . /var/www/html/

# Set environment variables for database connection
ENV DB_HOST=db
ENV DB_NAME=project_eval
ENV DB_USER=root
ENV DB_PASSWORD=secret

# Update database.php with environment variables
RUN sed -i "s/'your_db_username'/'root'/g" /var/www/html/database.php && \
sed -i "s/'your_db_password'/'secret'/g" /var/www/html/database.php

EXPOSE 80
