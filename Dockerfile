FROM node:20 as frontend
WORKDIR /src
COPY package.json yarn.lock ./
RUN yarn install
COPY vite.config.js tsconfig.json ./
COPY resources resources
RUN yarn build

FROM composer:2.5.8 as backend
WORKDIR /app
COPY . .
RUN composer install
RUN php -r "file_exists('.env') || copy('.env.example', '.env');" && php artisan key:generate
RUN rm -rf ./vendor && composer install --no-dev --no-autoloader --no-interaction --no-suggest --prefer-dist
RUN composer dump-autoload --optimize --no-dev --classmap-authoritative
RUN touch ./database/database.sqlite && php artisan migrate --force && php artisan db:seed --force
COPY --from=frontend /src/public/build/ ./public/build/
CMD php artisan serve --host=0.0.0.0 --port=8000
