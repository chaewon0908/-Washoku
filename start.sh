#!/usr/bin/env bash
# Render start script for Laravel

# Run migrations and seed
php artisan migrate --force
php artisan db:seed --force

# Start the PHP server
php artisan serve --host=0.0.0.0 --port=$PORT
