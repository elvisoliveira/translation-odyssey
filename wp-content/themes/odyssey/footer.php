<?php $contact = new WP_Query(array('page_id' => 5)); ?>
<div id="about-us">
    <dl>
        <dt>About us</dt>
        <dd><?php print get_post(array('name' => 'about'))->post_content; ?></dd>
    </dl>
</div>
<?php if ($contact->have_posts()): ?>
<div id="contact">
    <?php while ($contact->have_posts()): ?>
    <dl>
        <dt>Contact</dt>
        <dd><?php the_post(); ?><?php the_content(); ?></dd>
    </dl>
    <?php die(); endwhile; ?>
</div>
<?php endif; ?>