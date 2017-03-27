<div class="top">
    <div class="inner">
        <ul class="left">
            <li class="skype">
                <dl>
                    <dt>Skype:</dt>
                    <dd><?php print get_theme_mod('skype_setting', 'skype-id'); ?></dd>
                </dl>
            </li>
        </ul>
        <ul class="right">
            <li class="text">
                <span>FOLLOW US:</span>
            </li>
            <li class="icon feed">
                <span><?php post_comments_feed_link('<i class="icon-rss"></i>'); ?></span>
            </li>
            <li class="icon twitter">
                <a href="<?php print get_theme_mod('twitter_setting', 'http://twitter.com/'); ?>"><i class="icon-twitter"></i></a>
            </li>
            <li class="icon facebok">
                <a href="<?php print get_theme_mod('facebook_setting', 'http://facebook.com/'); ?>"><i class="icon-facebook"></i></i></a>
            </li>
        </ul>
    </div>    
</div>
<div class="nav <?php if (is_front_page()): ?>home<?php endif; ?>">
    <div class="inner">
        <div class="home-logo">
            <a href="<?php print get_home_url(); ?>"><?php print get_bloginfo('name'); ?></a>
        </div>
        <div class="home-menu">
            <?php foreach (wp_get_nav_menu_items('home') as $item): ?>
                <ul>
                    <li>
                        <?php if (is_front_page()): ?>
                            <a href="#<?php print $item->target; ?>"><?php print $item->title; ?></a>
                        <?php else: ?>
                            <a href="<?php print get_home_url(); ?>/<?php print $item->target; ?>"><?php print $item->title; ?></a>
                        <?php endif; ?>
                    </li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>