#!/usr/bin/env bash

set -e

role=${CONTAINER_ROLE:-app}
env=${APP_ENV:-development}


if [ "$role" = "app" ]; then
    echo 'Running the app'
    cd /var/www && php artisan migrate --seed --force  && php artisan serve --host 0.0.0.0 --port 8013
fi