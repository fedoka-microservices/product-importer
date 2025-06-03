FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer/composer:latest /usr/bin/composer /usr/bin/composer

COPY start.sh /var/www/start.sh
RUN chmod +x /var/www/start.sh
