FROM php:7.2-fpm

# Install modules
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libicu-dev \
        wget \
        git \
        zip \
        unzip \
            --no-install-recommends

RUN docker-php-ext-install zip intl mbstring pdo_mysql exif \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd

RUN pecl install -o -f xdebug \
    && pecl install -o -f mongodb \
    && pecl install -o -f memcached \
    && pecl install -o -f redis \
    && docker-php-ext-enable /usr/local/lib/php/extensions/no-debug-non-zts-20170718/mongodb.so \
    && docker-php-ext-enable /usr/local/lib/php/extensions/no-debug-non-zts-20170718/memcached.so \
    && docker-php-ext-enable /usr/local/lib/php/extensions/no-debug-non-zts-20170718/redis.so \
    && rm -rf /tmp/pear

COPY ./install-composer.sh /
COPY ./php.ini /usr/local/etc/php/
COPY ./www.conf /usr/local/etc/php/

RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && sh /install-composer.sh \
    && rm /install-composer.sh

RUN usermod -u 1000 www-data

VOLUME /root/.composer
WORKDIR /app

EXPOSE 9000
CMD ["php-fpm"]
