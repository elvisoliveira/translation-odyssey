FROM php:7-apache
MAINTAINER Elvis Oliveira <elvis.olv@gmail.com>

# Project Dependencies
WORKDIR /var/www/odyssey

# Enviroment Dependencies:
# Composer requires zip and git. (https://getcomposer.org/doc/00-intro.md#system-requirements)
RUN apt-get update && \
    apt-get install git unzip npm mysql-client libpng-dev libjpeg-dev -y && \
    docker-php-ext-install mysqli

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# WP CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp && \
    chmod +x /usr/local/bin/wp

# PHP Extensions
RUN docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr
RUN docker-php-ext-install mysqli gd

# Some required Node.js packages expects 
# nodejs command to be node.
RUN ln -s /usr/bin/nodejs /usr/bin/node

# Node.js 
RUN npm install -g bower grunt grunt-cli

# PHP / Apache Conf.
COPY ./.docker/webserver/php.ini ${PHP_INI_DIR}/php.ini
COPY ./.docker/webserver/apache2.conf ${APACHE_CONFDIR}/apache2.inc.conf
COPY ./.docker/webserver/000-default.conf ${APACHE_CONFDIR}/sites-available/000-default.conf

RUN echo "include apache2.inc.conf" >> /etc/apache2/apache2.conf

# xDebug on Docker
# https://goo.gl/rLzfMo
# RUN pecl install xdebug
# RUN docker-php-ext-enable xdebug
# RUN sed -i '1 a xdebug.remote_autostart=true'  /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_mode=req'        /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_handler=dbgp'    /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_connect_back=1 ' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_port=9000'       /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_host=127.0.0.1'  /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_enable=1'        /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN a2enmod rewrite && \
    apache2ctl restart

# Exec.
EXPOSE 80