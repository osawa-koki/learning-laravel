FROM composer:2.5.8
EXPOSE 8000
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-autoloader --no-interaction --no-suggest --prefer-dist
COPY . .
RUN composer dump-autoload --optimize --no-dev --classmap-authoritative
RUN touch ./database/database.sqlite && php artisan migrate --force && php artisan db:seed --force
CMD php artisan serve --host=0.0.0.0 --port=8000
