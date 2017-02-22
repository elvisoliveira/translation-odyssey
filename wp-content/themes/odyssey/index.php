<?php get_header(); ?>

<?php if (have_posts()): ?>

    <?php if (is_home() && ! is_front_page()): ?>
        <h1><?php single_post_title(); ?></h1>
    <?php endif; ?>

    <?php while (have_posts()): ?>
        <?php the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
    <?php endwhile; ?>

<?php else: ?>
    <?php get_template_part('content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>