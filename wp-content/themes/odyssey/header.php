<div class="header">
    <ul class="header-left">
        <li class="skype">
            <dl>
                <dt>Skype:</dt>
                <dd><?php print get_theme_mod('skype_setting', 'skype-id'); ?></dd>
            </dl>
        </li>
    </ul>
    <ul class="header-right">
        <li class="text">FOLLOW US:</li>
        <li class="feed">
            <?php post_comments_feed_link('RSS 2.0'); ?>
        </li>
        <li class="twitter">
            <a href="<?php print get_theme_mod('twitter_setting', 'http://twitter.com/'); ?>"></a>
        </li>
        <li class="facebok">
            <a href="<?php print get_theme_mod('facebook_setting', 'http://facebook.com/'); ?>"></a>
        </li>
    </ul>
</div>
<div class="navigation">
    <?php wp_list_pages('&title_li='); ?>
</div>
<div class="baner">
    <h1 class="blog-title"><a href="<?php bloginfo('wpurl'); ?>"><?php print get_bloginfo('name'); ?></a></h1>
    <h2 class="blog-descr"><?php print get_theme_mod('slogan_setting', 'Are you looking for a reliable translation Company? You have just found one!'); ?></h2>
</div>