#!/bin/bash

set -u

echo "Deployment started ..."


# Enter maintenance mode or return true
# if already is in maintenance mode
(php artisan down) || true

cp .env.example .env

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Run database migrations
php artisan migrate --force

php artisan key:generate --ansi

php artisan storage:link

ln -s public public_html

# Exit maintenance mode
php artisan up

echo "Deployment finished!"