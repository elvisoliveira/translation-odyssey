<div id="about-us">
    <dl>
        <dt>About us</dt>
        <dd><?php print get_post(array('name' => 'about'))->post_content; ?></dd>
    </dl>
</div>
<div id="contact">
    <dl>
        <dt>Contact</dt>
        <dd><?php print get_post(array('name' => 'contact'))->post_content; ?></dd>
    </dl>
</div>