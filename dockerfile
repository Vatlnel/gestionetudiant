FROM php:8.2-fpm

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier le projet
COPY . /var/www
WORKDIR /var/www

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Donner les bons droits
RUN chmod -R 775 storage bootstrap/cache

# Exposer le port attendu par Render
EXPOSE 10000

# Commande de démarrage
CMD php artisan serve --host=0.0.0.0 --port=10000