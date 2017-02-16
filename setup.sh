#!/bin/bash
# docker exec odyssey-webserver /bin/sh -c "/var/www/odyssey/setup.sh"

# Database


# WordPress Config
wp --allow-root core config --dbhost=database \
                            --dbname=translation-odyssey \
                            --dbuser=root \
                            --dbpass=123

# WordPress Install
wp --allow-root core install --url=http://localhost/ \
                             --title='Translation Odyssey' \
                             --admin_user=admin \
                             --admin_password=123 \
                             --admin_email=elvis.olv@gmail.com