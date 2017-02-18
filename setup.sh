#!/bin/bash
# docker exec odyssey-webserver /bin/sh -c "/var/www/odyssey/setup.sh"

# WordPress Download
wp --allow-root core download --locale=pt_BR

# WordPress Config
wp --allow-root core config --dbhost=database \
                            --dbname=translation-odyssey \
                            --dbuser=root \
                            --dbpass=123

# WordPress Install
wp --allow-root core install --url=http://webserver/ \
                             --title='Translation Odyssey' \
                             --admin_user=admin \
                             --admin_password=123 \
                             --admin_email=elvis.olv@gmail.com