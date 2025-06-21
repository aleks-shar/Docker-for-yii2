FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
        bash autoconf \
        net-tools \
        cron \
        mc \
        make g++ gcc \
        python3 \
        nano \
        curl \
        wget \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
	libpng-dev \
	libonig-dev \
	libzip-dev \
	libmcrypt-dev \
        && pecl install mcrypt \
	&& docker-php-ext-enable mcrypt \
        && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install -j$(nproc) gd \
        && docker-php-ext-enable opcache
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql
RUN pecl install redis \
	&& pecl install xdebug \
	&& docker-php-ext-enable redis xdebug

ADD xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

WORKDIR /var/www

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www

COPY --chown=www:www . /var/www

USER www

EXPOSE 9000

CMD php-fpm