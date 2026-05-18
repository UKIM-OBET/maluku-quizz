#!/bin/sh
set -e

# Clear cached config so Railway's environment variables take effect at runtime
php artisan config:clear
php artisan route:clear

# Generate app key if not already set
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "base64:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" ]; then
    php artisan key:generate --force
fi

# Run database migrations (requires DB to be available via Railway env vars)
echo "Running database migrations..."
php artisan migrate --force --no-interaction

# Start the application, honouring Railway's $PORT
exec "$@" --port="${PORT:-8000}"
