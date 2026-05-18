FROM php:8.2-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev zip curl nodejs npm \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl gd

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy app
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Install Node dependencies and build CSS
RUN npm install --legacy-peer-deps && npm run build

# Generate app key
RUN php artisan key:generate --force

# Run migrations
RUN php artisan migrate --force --no-interaction

ENV PORT 8000
EXPOSE 8000

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"]
