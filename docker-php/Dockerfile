FROM php:8.0.0-fpm-alpine
RUN apk update; \
    apk upgrade;
RUN docker-php-ext-install mysqli pdo pdo_mysql

# WORKDIR /var/www/html

# COPY script.sh .

# RUN chmod +x script.sh

# CMD ["sh", "script.sh"]