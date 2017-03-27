<?php
$loop['banner'] = array(
    'post_type' => array('banner'),
    'post_status' => array('publish'),
    'nopaging' => true,
    'order' => 'DESC',
    'orderby' => 'date'
);
$loop['team'] = array(
    'post_type' => array('team'),
    'post_status' => array('publish'),
    'nopaging' => true,
    'order' => 'DESC',
    'orderby' => 'date'
);
$loop['blog'] = array(
    'post_type' => array('post'),
    'post_status' => array('publish'),
    'nopaging' => true,
    'order' => 'DESC',
    'orderby' => 'date'
);

foreach ($loop as $key => $value)
{
    ${$key} = new WP_Query($value);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php bloginfo('name'); ?></title>
        <!-- Search Engines -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="robots" content="index, follow" />
        <meta name="author" content="http://github.com/elvisoliveira" />
        <meta name="keywords" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <!-- WordPress Head -->
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="header">
            <?php get_header(); ?>
        </div>
        <div class="banner">
            <div class="info">
                <h1 class="blog-title"><?php print get_bloginfo('name'); ?></h1>
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
        <div id="team">
            <div class="inner">
                <div class="team-title">
                    <a href="<?php print get_page_by_path('team')->guid; ?>">Team</a>
                </div>
                <?php if ($team->have_posts()): ?>
                    <div class="team-members">
                        <?php $index = 1; ?>
                        <ul>
                            <?php while ($team->have_posts()): $team->the_post(); ?>
                                <li>
                                    <div class="member-picture"><?php print get_field_object('team_picture'); ?></div>
                                    <div class="member-decsription"><?php print get_field_object('team_resume'); ?></div>
                                    <div class="member-name"><?php $team->the_title(); ?></div>
                                    <?php $index++; ?>
                                </li>
                                <?php if ($i % 3 == 0): ?></ul><ul><?php endif; ?>
                            <?php endwhile; ?>
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
        <div id="services">
            <div class="inner">
                <div class="team-title">
                    <a href="<?php print get_page_by_path('services')->guid; ?>">Services</a>
                </div>
                <div class="services-text">
                    <?php print get_post(array('name' => 'services'))->post_content; ?>
                </div>
            </div>
        </div>
        <div id="blog">
            <div class="inner">
                <div class="blog-title">
                    <a href="<?php print get_page_by_path('blog')->guid; ?>">Blog</a>
                </div>
                <div class="blog-list">
                    <?php if ($blog->have_posts()): ?>
                        <ul>
                            <?php while ($blog->have_posts()): $blog->the_post(); ?>
                                <li>
                                    <?php get_template_part('content', $blog->get_post_format()); ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <div class="message">
                            <p>No posts on the Blog section.</p>
                        </div>
                    <?php endif; ?>
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