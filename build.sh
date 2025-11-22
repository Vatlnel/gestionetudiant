#!/bin/bash
composer install --no-dev --optimize-autoloader

# Nettoyage des caches Laravel
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Recréation du cache de config
php artisan config:cache

# Exécution des migrations
php artisan migrate --force