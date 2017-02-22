#!/bin/bash
# docker exec odyssey-webserver /bin/sh -c "/var/www/odyssey/setup.sh"

# WordPress Download
if [ ! -f "wp-settings.php" ]; then
    wp --allow-root core download --locale=pt_BR
fi

# WordPress Config
if [ ! -f "wp-config.php" ]; then
    wp --allow-root core config --dbhost=database \
                                --dbname=translation-odyssey \
                                --dbuser=root \
                                --dbpass=123
fi

# WordPress Install
wp --allow-root core install --url=http://wordpress/ \
                             --title='Translation Odyssey' \
                             --admin_user=admin \
                             --admin_password=123 \
                             --admin_email=elvis.olv@gmail.com
                             --skip-email # Avoid postmail: 'sh: 1: -t: not found'