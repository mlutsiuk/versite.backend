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


RUN if composer show | grep spiral/roadrunner >/dev/null; then \
      ./vendor/bin/rr get-binary; else \
      echo "spiral/roadrunner package is not installed. exiting..."; exit 1; \
    fi

FROM php:8.1-alpine

ARG WWWUSER=1101
ARG WWWGROUP=1101

ENV ROOT=/var/www/html
WORKDIR $ROOT


RUN set -ex \
    && apk update  \
    && apk upgrade
RUN apk --no-cache add \
    icu-dev \
    gettext \
    gettext-dev \
    git \
    postgresql-dev \
    mc


RUN docker-php-ext-install  gettext
RUN docker-php-ext-configure gettext
RUN docker-php-ext-configure intl
RUN docker-php-ext-install \
    sockets \
    pdo \
    pdo_pgsql \
    intl \
    bcmath

#RUN addgroup --gid $WWWGROUP octane
#RUN adduser -u $WWWUSER octane octane
#RUN #addgroup octane
#RUN adduser -D octane octane

COPY ./src .
COPY --from=vendor ${ROOT}/vendor vendor
COPY --from=vendor ${ROOT}/rr* ${ROOT}/composer.json ./

RUN mkdir -p storage/framework/{sessions,views,cache} storage/logs bootstrap/cache
RUN #chown -R octane:octane storage bootstrap/cache
RUN chmod -R ug+rwx storage bootstrap/cache
RUN chmod +x rr

RUN php artisan optimize
