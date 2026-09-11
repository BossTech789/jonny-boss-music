FROM php:8.3-cli

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    xz-utils \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libpq-dev \
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
    && rm -rf /var/lib/apt/lists/*

# Install Node.js 20 directly
RUN curl -fsSL https://nodejs.org/dist/v20.19.5/node-v20.19.5-linux-x64.tar.xz \
    | tar -xJ -C /usr/local --strip-components=1

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

# Create Laravel directories
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache

# Set permissions
RUN chmod -R 775 storage bootstrap/cache

# Create storage symlink
RUN php artisan storage:link || true

EXPOSE 10000

CMD php artisan serve \
    --host=0.0.0.0 \
    --port=${PORT:-10000}
