<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
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
    <body <?php body_class(); ?>>
        <div class="header">
            <?php get_header(); ?>
        </div>
        <div class="content">
            <div class="inner">
                <?php if (have_posts()): ?>
                    <div class="page">
                        <?php while (have_posts()): ?>
                            <?php the_post(); ?>
                            <div class="content-title"><?php the_title(); ?><hr /></div>
                            <div class="content-desc"><?php the_content(); ?></div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p>Sorry, this page does not exist.</p>
                <?php endif; ?>
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