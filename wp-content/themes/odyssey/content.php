<div class="blog-image">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('post-home'); ?>
    </a>
</div>
<div class="blog-title">
    <a href="<?php the_permalink(); ?>">
        <h3><?php the_title(); ?></h3>
    </a>
</div>
<div class="blog-meta">
    <span class="date"><i class="icon-calendar"></i> <?php print get_the_date('Y-m-d'); ?></span>
</div>
<div class="blog-desc">
    <a href="<?php the_permalink(); ?>">
        <?php the_content(); ?>
    </a>
</div>