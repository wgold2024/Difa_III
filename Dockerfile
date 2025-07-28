# BACKEND
# Используем официальный образ PHP
FROM php:8.1-fpm

# Установка необходимых расширений PHP и др. зависимостей
RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git && \
      docker-php-ext-install pdo_pgsql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка рабочего каталога
WORKDIR /var/www

# Копируем Ваши файлы приложения
COPY . .

# Установка зависимостей
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Копируем конфигурацию
COPY .env.example .env
