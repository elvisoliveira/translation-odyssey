<div id="about-us">
    <dl>
        <dt>About us</dt>
        <dd><?php print get_post(array('name' => 'about'))->post_content; ?></dd>
    </dl>
</div>
<div id="contact">
    <dl>
        <dt>Contact</dt>
        <dd><?php print do_shortcode(get_post(5)->post_content); ?></dd>
    </dl>
</div>
<div id="facebook">
    <p>Facebook</p>
</div>