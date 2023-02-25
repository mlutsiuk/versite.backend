FROM php:8.1.11-fpm-alpine

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
RUN docker-php-ext-configure intl \
    && docker-php-ext-configure gettext \
    && docker-php-ext-install \
    pdo  \
    pdo_pgsql \
    intl \
    gettext \
    bcmath

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
