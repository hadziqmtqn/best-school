FROM dunglas/frankenphp:1.1-php8.3-bookworm

# Install ekstensi wajib untuk Laravel, Filament, dan MariaDB
RUN install-php-extensions \
    pdo_mysql \
    gd \
    intl \
    zip \
    bcmath \
    opcache

# Set working directory sesuai standar FrankenPHP
WORKDIR /app

# Pastikan folder storage dan cache bisa ditulisi
# Ini penting agar tidak muncul error permission di Laravel
RUN chown -R www-data:www-data /app