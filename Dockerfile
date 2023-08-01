FROM php:7.4-apache

# set main params
ARG BUILD_ARGUMENT_DEBUG_ENABLED=false
ENV DEBUG_ENABLED=$BUILD_ARGUMENT_DEBUG_ENABLED
ARG BUILD_ARGUMENT_ENV=dev
ENV ENV=$BUILD_ARGUMENT_ENV
ENV APP_HOME /var/www/html

# install all the dependencies and enable PHP modules
RUN apt-get update
RUN apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++

RUN docker-php-ext-install \
    bz2 \
    intl \
    bcmath \
    opcache \
    calendar \
    pdo_mysql \
    mysqli

RUN a2dissite 000-default.conf

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN chown -R www-data:www-data $APP_HOME

COPY . $APP_HOME

COPY ./.docker/apache/api.conf /etc/apache2/sites-available/api.conf
RUN a2ensite api.conf
COPY ./.docker/php/php.ini /usr/local/etc/php/php.ini

RUN a2enmod rewrite
RUN a2enmod ssl

WORKDIR $APP_HOME

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && composer self-update

USER www-data

USER root

ENTRYPOINT ["bash", "./.docker/start-apache.sh"]
