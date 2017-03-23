<?php

$loop['banner'] = array(
    'post_type'   => array('banner'),
    'post_status' => array('publish'),
    'nopaging'    => true,
    'order'       => 'DESC',
    'orderby'     => 'date'
);

$loop['team'] = array(
    'post_type'   => array('team'),
    'post_status' => array('publish'),
    'nopaging'    => true,
    'order'       => 'DESC',
    'orderby'     => 'date'
);

foreach ($loop as $key => $value)
{
    ${$key} = new WP_Query($value);
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php wp_title('|', true, 'right'); ?></title>
        <!-- Search Engines -->
        <meta charset="UTF-8" />
        <meta name="robots" content="index, follow" />
        <meta name="author" content="http://github.com/elvisoliveira" />
        <meta name="keywords" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <!-- WordPress Head -->
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="header">
            <?php get_header(); ?>
        </div>
        <div class="banner">
            <div class="info">
                <h1 class="blog-title">
                    <a href="<?php bloginfo('wpurl'); ?>"><?php print get_bloginfo('name'); ?></a>
                </h1>
                <h2 class="blog-descr">
                    <?php print get_theme_mod('slogan_setting', 'Are you looking for a reliable translation Company? You have just found one!'); ?>
                </h2>    
            </div>
            <?php if ($banner->have_posts()): ?>
                <div class="images">
                    <ul>
                        <?php while ($banner->have_posts()): $banner->the_post(); ?>
                            <li style="background-image: url('<?php print get_field_object('banner_image')['value']['sizes']['banner-home']; ?>');">
                                <!--<?php the_title(); ?>-->
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <div class="team">
            <div class="inner">
                <div class="team-title">
                    <h2>Team</h2>
                </div>
                <?php if ($team->have_posts()): ?>
                    <div class="team-members">
                        <ul>
                            <?php $index = 1; while ($team->have_posts()): $team->the_post(); ?>
                                <li>
                                    <div class="member-picture"><?php print get_field_object('team_picture'); ?></div>
                                    <div class="member-decsription"><?php print get_field_object('team_resume'); ?></div>
                                    <div class="member-name"><?php $team->the_title(); ?></div>
                                </li>
                                <?php if($i % 3 == 0): ?></ul><ul><?php endif; ?>
                            <?php $index++; endwhile; ?>
                        </ul>
                    </div>
                    <div class="team-pager">
                        <a href="#prev" class="prev"><i class="icon-angle-left"></i></a>
                        <a href="#next" class="next"><i class="icon-angle-right"></i></a>
                    </div>
                <?php else: ?>
                    <div class="message">
                        <p>No team members added.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="services">
            <div class="inner">
                <div class="team-title">
                    <h2>Services</h2>
                </div>
                <div class="services-text">
                    <?php print get_post(array('name' => 'services'))->post_content; ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="inner">
                <?php get_footer(); ?>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>