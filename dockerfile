# Utilise une image officielle PHP avec FPM
FROM php:8.2-fpm

# Installe les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libssl-dev \
    libcurl4-openssl-dev \
    libicu-dev \
    libxslt1-dev \
    libreadline-dev \
    libedit-dev \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie le projet dans le conteneur
COPY . /var/www
WORKDIR /var/www

# Installe les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Donne les bons droits
RUN chown -R www-data:www-data /var/www

# Expose le port attendu par Render
EXPOSE 10000

# Commande de démarrage
CMD php artisan serve --host=0.0.0.0 --port=10000


RUN docker-php-ext-install pdo pdo_pgsql