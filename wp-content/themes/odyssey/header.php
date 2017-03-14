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
            <li class="feed">
                <span><?php post_comments_feed_link('<i class="icon-rss"></i>'); ?></span>
            </li>
            <li class="twitter">
                <a href="<?php print get_theme_mod('twitter_setting', 'http://twitter.com/'); ?>"><i class="icon-twitter"></i></a>
            </li>
            <li class="facebok">
                <a href="<?php print get_theme_mod('facebook_setting', 'http://facebook.com/'); ?>"><i class="icon-facebook"></i></i></a>
            </li>
        </ul>
    </div>    
</div>
<div class="nav">
    <div class="inner">
        <ul>
            <?php if (is_home()): ?>
                <?php foreach (wp_get_nav_menu_items('home') as $item): ?>
                    <li><a href="#<?php print $item->target; ?>"><?php print $item->title; ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <?php wp_list_pages('&title_li='); ?>
            <?php endif; ?>
        </ul>
    </div>
</div>