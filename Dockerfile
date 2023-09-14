FROM php:8.0-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Copy Laravel files
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install Composer and Laravel dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

EXPOSE 8000
CMD ["php artisan serve --host=0.0.0.0"]
