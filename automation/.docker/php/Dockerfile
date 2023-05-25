#############################################################################
#
# Docker for PHP
#
# Edition: Slim - the lightest edition, including just the essentials for
# a modern, MVC-based PHP application (based on Symfony or Laravel)
#
##############################################################################
ARG PHP_VERSION="8.1"

# Start from the official Dockerhub PHP image that uses version
# ${PHP_VERSION} of PHP and Alpine Linux 3.18
FROM php:${PHP_VERSION}-fpm-alpine3.18 as base

# Returns an error code even when any command in a pipe command chain fails
# For details, please see https://github.com/hadolint/hadolint/wiki/DL4006
SHELL ["/bin/ash", "-eo", "pipefail", "-c"]

# Add the PHP extension installler package
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# - Add several common packages without storing them in the package cache (used to reduce image size)
RUN apk add --update --no-cache make \
    # - Install and enable several common PHP extensions: bcmatch, intl & zip (required by most frameworks)
    && chmod +x /usr/local/bin/install-php-extensions \
        && sync  \
        && install-php-extensions pdo_mysql intl zip bcmath redis apcu \
    && docker-php-ext-enable opcache

######################################
# Build upon the base image
# to generate the local/dev image
######################################
FROM base as dev

ARG COMPOSER_VERSION="2.1.6"

ENV COMPOSER_MEMORY_LIMIT=-1

# Returns an error code even when any command in a pipe command chain fails
# For details, please see https://github.com/hadolint/hadolint/wiki/DL4006
SHELL ["/bin/ash", "-eo", "pipefail", "-c"]

# Install Xdebug
RUN install-php-extensions xdebug

# Install Composer and make it available globally, then install yarn and npm
RUN apk add --no-cache --virtual composer-deps curl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version="${COMPOSER_VERSION}" \
    && apk del composer-deps \
    && apk add --no-cache yarn \
    && apk add --no-cache npm

## Copy the dev PHP config file
COPY automation/configs/php/dev.ini /usr/local/etc/php/conf.d

# Add the custom packages/PHP extensions required by the application
RUN install-php-extensions gd

# Destroy Opcache INI
RUN rm /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini

# Install dependencies for wkhtmltopdf
RUN apk add --no-cache \
      libstdc++ \
      libx11 \
      libxrender \
      libxext \
      libssl1.1 \
      ca-certificates \
      fontconfig \
      freetype \
      ttf-dejavu \
      ttf-droid \
      ttf-freefont \
      ttf-liberation \
    && apk add --no-cache --virtual .build-deps \
      msttcorefonts-installer \
    # Install microsoft fonts
    && update-ms-fonts \
    && fc-cache -f \
    # Clean up when done
    && rm -rf /tmp/* \
    && apk del .build-deps

# ICONV and Docker/Alpine don't get along
# RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted gnu-libiconv
RUN apk add gnu-libiconv=1.17-r2 --update-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

CMD [ "php-fpm", "--nodaemonize" ]
