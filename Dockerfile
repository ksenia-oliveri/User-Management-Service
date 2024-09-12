# Dockerfile
FROM php:8.3

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip

# Установка расширений PHP
RUN docker-php-ext-install pdo pdo_mysql zip gd

# Копируем файлы проекта
COPY . /var/www/html

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка зависимостей проекта
RUN composer install

WORKDIR /var/www/html

# Настройка прав
RUN chown -R www-data:www-data /var/www/html/storage

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8001
