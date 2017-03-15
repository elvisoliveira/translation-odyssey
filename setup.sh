#!/bin/bash
# docker exec -i -t odyssey-webserver /bin/sh -c "/var/www/odyssey/setup.sh"

# Node.js resources
(cd ./wp-content/themes/odyssey/node && npm run assets)

# WordPress Download
if [ ! -f "wp-settings.php" ]; then
    wp --allow-root core download # --locale=pt_BR
fi

# WordPress Config
if [ ! -f "wp-config.php" ]; then
    # DB Config on docker-compose.yml
    wp --allow-root core config --dbhost=database \
                                --dbname=$MYSQL_DATABASE \
                                --dbuser=$MYSQL_USER \
                                --dbpass=$MYSQL_PASSWORD
fi

# WordPress: Post Types

## Team
if [ ! -f "wp-content/themes/odyssey/post-types/team.php" ]; then
    wp --allow-root scaffold post-type team --theme='odyssey' --label='Team Member' --dashicon='id-alt'
fi

## Banner
if [ ! -f "wp-content/themes/odyssey/post-types/banner.php" ]; then
    wp --allow-root scaffold post-type banner --theme='odyssey' --label='Banner' --dashicon='images-alt'
fi

## Services
if [ ! -f "wp-content/themes/odyssey/post-types/services.php" ]; then
    wp --allow-root scaffold post-type services --theme='odyssey' --label='Service' --dashicon='cart'
fi

# WordPress Install
while [[ -z "$admin_password" ]]; do
    read -p -s "[WP] Password: " admin_password
done

while [[ -z "$admin_user" ]]; do
    read -p "[WP] User: " admin_user
done

while [[ -z "$admin_email" ]]; do
    read -p "[WP] Email: " admin_email
done

wp --allow-root core install --url=http://translation-odyssey/ \
                             --title='Translation Odyssey' \
                             --admin_user=$admin_user \
                             --admin_password=$admin_password \
                             --admin_email=$admin_email \
                             --skip-email # Avoid postmail: 'sh: 1: -t: not found'

# WordPress: ACF
wp --allow-root plugin install advanced-custom-fields --activate

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
wp --allow-root menu item add-custom home 'Blog' / --target=blog
wp --allow-root menu item add-custom home 'Contato' / --target=contact
wp --allow-root menu item add-custom home 'Equipe' / --target=team
wp --allow-root menu item add-custom home 'Servi&ccedil;os' / --target=services