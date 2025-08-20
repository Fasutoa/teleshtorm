# ---------- Стадия PHP / Laravel ----------
FROM php:8.4-fpm AS php

# Устанавливаем зависимости PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    npm \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Копировать сюда Laravel проект не будем — он монтируется томами
CMD ["php-fpm"]

# ---------- Стадия Node / Nuxt ----------
FROM node:20 AS node

WORKDIR /app

# Копировать сюда Nuxt проект не будем — он монтируется томами
EXPOSE 3000

CMD ["npm", "run", "dev"]
