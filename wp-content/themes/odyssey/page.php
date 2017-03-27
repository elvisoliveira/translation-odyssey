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
    <body>
        <div class="header">
            <?php get_header(); ?>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : ?>
                        <?php the_post(); ?>
                        <?php get_template_part('content', get_post_format()); ?>
                    <?php endwhile; ?>
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