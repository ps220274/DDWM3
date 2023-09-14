FROM php:8.0-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer and Laravel dependencies
RUN apt-get install curl
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy Laravel files
COPY . /var/www/html

RUN composer install

EXPOSE 8000

CMD ["php","artisan","serve","--host=0.0.0.0"]
