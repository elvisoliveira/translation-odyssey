<div class="blog-header">
    <h1 class="blog-title"><a href="<?php bloginfo('wpurl'); ?>"><?php echo get_bloginfo('name'); ?></a></h1>
    <p class="lead blog-description">
        <?php echo get_bloginfo('description'); ?>
    </p>
</div>
<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <?php wp_list_pages('&title_li='); ?>
        </nav>
    </div>
</div>