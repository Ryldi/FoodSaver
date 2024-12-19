# Use PHP 8.2 with Apache as the base image
FROM php:8.2-apache

# Install system dependencies for PHP, image manipulation (GD), MySQL, zip, and other required packages
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip \
    && apt-get install -y default-mysql-client \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer (from official Composer image)
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

# Install Node.js (for compiling Tailwind CSS, Flowbite, etc.)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Set working directory inside the container
WORKDIR /var/www/html

# Copy Laravel project files into the container
COPY . .

# Install PHP dependencies via Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Install Node.js dependencies (including Tailwind CSS and Flowbite)
RUN npm install

# Build frontend assets (compile Tailwind CSS, Flowbite, etc.)
RUN npm run build

# Set proper permissions for Laravel's storage and other directories
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 for the Apache server (use 8000 or 80 depending on your setup)
EXPOSE 80

# Enable Apache mod_rewrite (needed for Laravel routing)
RUN a2enmod rewrite

# Start Apache in the foreground
CMD ["apache2-foreground"]