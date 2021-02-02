FROM php:7.4-fpm

RUN apt-get update -y && apt-get install -y libmcrypt-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo
WORKDIR /app
COPY . /app

RUN composer install
ENTRYPOINT php bin/console server:run 0.0.0.0:8000