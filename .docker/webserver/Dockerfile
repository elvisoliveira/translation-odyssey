FROM php:7-apache
MAINTAINER Elvis Oliveira <elvis.olv@gmail.com>

# Project Dependencies
WORKDIR /var/www/odyssey

# Enviroment Dependencies:
# Composer requires zip and git. (https://getcomposer.org/doc/00-intro.md#system-requirements)
RUN apt-get update && \
    apt-get install git unzip npm -y && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Some required Node.js packages expects 
# nodejs command to be node.
RUN ln -s /usr/bin/nodejs /usr/bin/node

# PHP / Apache Conf.
COPY ./.docker/webserver/php.ini ${PHP_INI_DIR}/php.ini
COPY ./.docker/webserver/apache2.conf ${APACHE_CONFDIR}/apache2.inc.conf
COPY ./.docker/webserver/000-default.conf ${APACHE_CONFDIR}/sites-available/000-default.conf

RUN echo "Include apache2.inc.conf" >> /etc/apache2/apache2.conf

RUN a2enmod rewrite && \
    apache2ctl restart

# Composer
# RUN composer install --no-interaction

# Exec.
EXPOSE 80