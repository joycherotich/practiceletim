#!/bin/bash

# Navigate to the Laravel project directory
cd /var/www/html

# Install dependencies (if needed)
# composer install

# Run database migrations and seed (if needed)
# php artisan migrate --seed

# Start the Laravel application
php artisan serve --host=0.0.0.0 --port=8090
