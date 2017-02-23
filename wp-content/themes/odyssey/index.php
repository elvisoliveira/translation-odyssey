<?php get_header(); ?>

<?php if (have_posts()): ?>

    <?php if (is_home() && ! is_front_page()): ?>
        <h1><?php single_post_title(); ?></h1>
    <?php endif; ?>

    <?php while (have_posts()): ?>
        <?php the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php
                    if ( is_single() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                    endif;
                ?>
            </header>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>

<?php else: ?>
    <?php get_template_part('content', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>