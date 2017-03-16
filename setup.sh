#!/bin/bash
# docker exec -i -t odyssey-webserver /bin/sh -c "/var/www/odyssey/setup.sh"

# Node.js resources
read -p "Execute NPM? [yes] " npm

while [[ -z "$npm" ]]; do
    npm="yes"
done

if [ "$npm" == "yes" ]; then
  (cd ./wp-content/themes/odyssey/node && npm run assets)
fi

# WordPress Install ############################################################
################################################################################

# Download
if [ ! -f "wp-settings.php" ]; then
    wp core download --allow-root # --locale=pt_BR
fi

# Config
if [ ! -f "wp-config.php" ]; then
    # DB Config on docker-compose.yml
    wp core config --dbhost=database \
                   --dbname=$MYSQL_DATABASE \
                   --dbuser=$MYSQL_USER \
                   --dbpass=$MYSQL_PASSWORD \
                   --allow-root
fi

# Install
while [[ -z "$admin_user" ]]; do
    read -p "[WP] User: " admin_user
done

while [[ -z "$admin_password" ]]; do
    read -p "[WP] Password: " admin_password
done

while [[ -z "$admin_email" ]]; do
    read -p "[WP] Email: " admin_email
done

wp core install --url=http://translation-odyssey/ \
                --title='Translation Odyssey' \
                --admin_user=$admin_user \
                --admin_email=$admin_email \
                --admin_password=$admin_password \
                --allow-root \
                --skip-email # Avoid postmail: 'sh: 1: -t: not found'

# WordPress Setup ##############################################################
################################################################################

# Post Type: Team
if [ ! -f "wp-content/themes/odyssey/post-types/team.php" ]; then
    wp scaffold post-type team --theme='odyssey' \
                               --label='Team Member' \
                               --dashicon='id-alt' \
                               --allow-root
fi

# Post Type: Banner
if [ ! -f "wp-content/themes/odyssey/post-types/banner.php" ]; then
    wp scaffold post-type banner --theme='odyssey' \
                                 --label='Banner' \
                                 --dashicon='images-alt' \
                                 --allow-root
fi

# Post Type: Services
if [ ! -f "wp-content/themes/odyssey/post-types/services.php" ]; then
    wp scaffold post-type services --theme='odyssey' \
                                   --label='Service' \
                                   --dashicon='cart' \
                                   --allow-root
fi

# Plugins: ACF
wp plugin install advanced-custom-fields --activate --allow-root

# Theme: Odyssey
wp theme activate odyssey --allow-root

# WordPress Content: Post ######################################################
################################################################################

# Delete default post.
wp site empty --yes --allow-root

# Page: Team
wp post create ./.docker/wordpress/post-content.txt --allow-root \
                                                    --post_type='page' \
                                                    --post_status='publish' \
                                                    --post_title='Equipe'

# Page: Services
wp post create ./.docker/wordpress/post-content.txt --allow-root \
                                                    --post_type='page' \
                                                    --post_status='publish' \
                                                    --post_title='Servi&ccedil;os'

# Page: Blog
wp post create ./.docker/wordpress/post-content.txt --allow-root \
                                                    --post_type='page' \
                                                    --post_status='publish' \
                                                    --post_title='Blog'

# Page: Contact
wp post create ./.docker/wordpress/post-content.txt --allow-root \
                                                    --post_type='page' \
                                                    --post_status='publish' \
                                                    --post_title='Contato'

# WordPress Content: Menu ######################################################
################################################################################

wp menu create "Home" --allow-root

# Menu: Item
wp --allow-root menu item add-custom home 'Blog' / --target=blog
wp --allow-root menu item add-custom home 'Contato' / --target=contact
wp --allow-root menu item add-custom home 'Equipe' / --target=team
wp --allow-root menu item add-custom home 'Servi&ccedil;os' / --target=services

# WordPress Content: Banner ####################################################
################################################################################

WP_TEMP=$(mktemp -d)

for WP_INDX in {1..5}; do

    # Temp location
    WP_IMAG="${WP_TEMP}/${WP_INDX}.jpg"

    # Download 5 ramdom images 1000x1000
    curl -o ${WP_IMAG} 'https://unsplash.it/1000/1000/?random'

    # Attach on WordPress
    WP_ATTC=$(wp media import ${WP_IMAG} --porcelain --allow-root)

    # Posts
    WP_NODE=("wp post create --post_type='banner'      " # Type
             "               --post_status='publish'   " # Status
             "               --post_title='${WP_IMAG}' " # Title: Unsupported spaces
             "               --porcelain               " # Return
             "               --allow-root              ")

    WP_POST=$(${WP_NODE[@]})

    # ACF
    wp eval-file ./.docker/wordpress/post-content.php --allow-root \
                                                      $WP_INDX \
                                                      $WP_TEMP \
                                                      $WP_ATTC \
                                                      $WP_POST
done