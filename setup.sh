#!/bin/bash
# docker exec odyssey-webserver /bin/sh -c "/var/www/odyssey/setup.sh"

# Node.js resources
(cd ./wp-content/themes/odyssey/node && npm run assets)

# WordPress Download
if [ ! -f "wp-settings.php" ]; then
    wp --allow-root core download # --locale=pt_BR
fi

# WordPress Config
if [ ! -f "wp-config.php" ]; then
    wp --allow-root core config --dbhost=database \
                                --dbname=translation-odyssey \
                                --dbuser=root \
                                --dbpass=123
fi

# WordPress Install
wp --allow-root core install --url=http://translation-odyssey/ \
                             --title='Translation Odyssey' \
                             --admin_user=admin \
                             --admin_password=123 \
                             --admin_email=elvis.olv@gmail.com \
                             --skip-email # Avoid postmail: 'sh: 1: -t: not found'

# WordPress: Switch theme.
wp --allow-root theme activate odyssey

# WordPress: Delete default post.
wp --allow-root site empty --yes

# WordPress: Create pages.
wp --allow-root post create ./.docker/wordpress/post-content.txt --post_type='page' --post_status='publish' --post_title='Equipe'
wp --allow-root post create ./.docker/wordpress/post-content.txt --post_type='page' --post_status='publish' --post_title='Servi&ccedil;os'
wp --allow-root post create ./.docker/wordpress/post-content.txt --post_type='page' --post_status='publish' --post_title='Blog'
wp --allow-root post create ./.docker/wordpress/post-content.txt --post_type='page' --post_status='publish' --post_title='Contato'

# WordPress: Home menu
wp --allow-root menu create "Home"

# WordPress: Home menu itens
wp --allow-root menu item add-custom home 'Equipe' / --target=team
wp --allow-root menu item add-custom home 'Servi&ccedil;os' / --target=services
wp --allow-root menu item add-custom home 'Blog' / --target=blog
wp --allow-root menu item add-custom home 'Contato' / --target=contact