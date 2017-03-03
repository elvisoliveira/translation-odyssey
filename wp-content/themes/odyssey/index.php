<?php get_header(); ?>
<div class="row">
    <div class="blog-main">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()): ?> 
                <?php the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>
            <nav>
                <ul class="pager">
                    <li><?php next_posts_link('Previous'); ?></li>
                    <li><?php previous_posts_link('Next'); ?></li>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>