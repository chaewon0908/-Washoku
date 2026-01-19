#!/usr/bin/env bash
# Render build script for Laravel

# Exit on error
set -e

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install Node dependencies and build assets
npm install
npm run build

# Create SQLite database if it doesn't exist
touch database/database.sqlite

# Laravel optimization
php artisan config:cache
php artisan route:cache
php artisan view:cache
