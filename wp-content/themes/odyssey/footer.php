<div id="about">
    <dl>
        <dt>About us</dt>
        <dd><?php print get_page_by_path('about')->post_content; ?></dd>
    </dl>
</div>
<div id="contact">
    <dl>
        <dt>Contact</dt>
        <dd><?php print do_shortcode(get_page_by_path('contact')->post_content); ?></dd>
    </dl>
</div>
<div id="facebook">
    <p>Facebook</p>
</div>