<?php $about = get_page_by_path('about'); ?>
<div id="about">
    <dl>
        <dt><a href="<?php print $about->guid; ?>">About</a></dt>
        <dd><?php print wp_trim_words(do_shortcode($about->post_content), 40); ?></dd>
    </dl>
</div>
<?php $contact = get_page_by_path('contact'); ?>
<div id="contact">
    <dl>
        <dt><a href="<?php print $contact->guid; ?>">Contact</a></dt>
        <dd><?php print do_shortcode($contact->post_content); ?></dd>
    </dl>
</div>
<div id="facebook">
    <p>Facebook</p>
</div>