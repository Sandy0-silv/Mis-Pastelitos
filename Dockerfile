FROM php:7.4.15-apache

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions gd xdebug mysqli pdo pdo_mysql @composer
RUN a2enmod rewrite