FROM composer:2.5.8
WORKDIR /app
COPY . .
RUN composer install
RUN php -r "file_exists('.env') || copy('.env.example', '.env');" && php artisan key:generate
RUN rm -rf ./vendor && composer install --no-dev --no-autoloader --no-interaction --no-suggest --prefer-dist
RUN composer dump-autoload --optimize --no-dev --classmap-authoritative
RUN touch ./database/database.sqlite && php artisan migrate --force && php artisan db:seed --force
CMD php artisan serve --host=0.0.0.0 --port=8000
