FROM composer:2.5.4 AS vendor

WORKDIR /var/www/html

COPY src/composer* ./
RUN composer install \
  --no-interaction \
  --prefer-dist \
  --ignore-platform-reqs \
  --optimize-autoloader \
  --apcu-autoloader \
  --ansi \
  --no-scripts \
  --audit



FROM php:8.1.11-fpm-alpine

ENV ROOT=/var/www/html

RUN apk --update --no-cache add \
    icu-dev \
    gettext \
    gettext-dev \
    git

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

RUN sed -i "s/user = www-data/user = root/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = root/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install  gettext
RUN docker-php-ext-configure intl
RUN docker-php-ext-configure gettext
RUN docker-php-ext-install \
    sockets \
    pdo \
    pdo_pgsql \
    intl \
    gettext \
    bcmath

COPY ./src/database ./database
COPY ./src/lang ./lang
COPY ./src/public ./public
COPY ./src/resources ./resources
COPY ./src/artisan ./

COPY --from=vendor ${ROOT}/vendor vendor
COPY --from=vendor ${ROOT}/composer.json ./

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
