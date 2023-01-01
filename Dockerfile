FROM php:8.1-fpm

WORKDIR /var/www

COPY docker/start.sh /usr/local/bin/start
RUN chown -R www-data:www-data /var/www \
    && chmod u+x /usr/local/bin/start


COPY composer.json /var/www/

COPY . /var/www/

RUN apt-get update && apt-get upgrade -y

RUN apt-get install -y curl zip unzip libpng-dev libonig-dev libxml2-dev iputils-ping

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer clear-cache
RUN composer update
RUN composer install --no-dev --no-interaction
RUN composer dump-autoload

#COPY . /var/www

#RUN chown -R www-data: /var/www/storage
EXPOSE 9000

CMD ["/usr/local/bin/start"]