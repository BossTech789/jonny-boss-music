FROM php:8.3-cli

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        pdo_pgsql \
        mbstring \
        bcmath \
        exif \
        pcntl \
        zip \
        gd \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Application directory
WORKDIR /var/www/html

# Copy Laravel application
COPY . .

# Install PHP dependencies
RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --optimize-autoloader

# Install Node dependencies and build Vite assets
RUN npm ci && npm run build

# Create Laravel storage/cache directories
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache

# Set permissions
RUN chmod -R 775 storage bootstrap/cache

# Create storage symlink
RUN php artisan storage:link || true

# Render uses the PORT environment variable
EXPOSE 10000

CMD php artisan serve \
    --host=0.0.0.0 \
    --port=${PORT:-10000}
