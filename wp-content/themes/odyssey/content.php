<div class="content-image">
    <?php if (has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('post-home'); ?>
        </a>
    <?php else: ?>
        <p>No image.</p>
    <?php endif; ?>
</div>
<div class="content-title">
    <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
    </a>
</div>
<div class="content-meta">
    <span class="date"><i class="icon-calendar"></i> <?php print get_the_date('Y-m-d'); ?></span>
</div>
<div class="content-desc">
    <a href="<?php the_permalink(); ?>">
        <?php the_content(); ?>
    </a>
</div>