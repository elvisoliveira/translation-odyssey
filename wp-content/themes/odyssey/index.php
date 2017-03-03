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
        <div class="head">
            <?php get_header(); ?>
        </div>
        <div class="body">
            <div class="post">
                <?php if (have_posts()): ?>
                    <div class="posts list">
                        <?php while (have_posts()): ?> 
                            <li>
                                <div class="post">
                                    <?php the_post(); ?>    
                                </div>
                                <div class="temp">
                                    <?php get_template_part('content', get_post_format()); ?>    
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </div>
                    <div class="posts pager">
                        <ul>
                            <li><?php next_posts_link('Previous'); ?></li>
                            <li><?php previous_posts_link('Next'); ?></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="posts message">
                        <p>No post found.</p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="side">
                <?php get_sidebar(); ?>
            </div>
        </div>
        <div class="foot">
            <?php get_footer(); ?>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>