<?php

// Scripts and Styles
function odyssey_scripts()
{
    wp_enqueue_style('blog', get_template_directory_uri() . '/css/blog.css');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true);
}

add_action('wp_enqueue_scripts', 'odyssey_scripts');

// Google Fonts
function odyssey_google_fonts()
{
    wp_register_style('OpenSans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
    wp_enqueue_style('OpenSans');
}

add_action('wp_print_styles', 'odyssey_google_fonts');

function odyssey_customizer($wp_customize)
{
    $section = 'odyssey_settings';

    $email    = array('section' => $section, 'type' => 'email', 'label' => 'Email');
    $skype    = array('section' => $section, 'type' => 'url', 'label' => 'Skype');
    $twitter  = array('section' => $section, 'type' => 'url', 'label' => 'Twitter');
    $facebook = array('section' => $section, 'type' => 'text', 'label' => 'Facebook');
    $slogan   = array('section' => $section, 'type' => 'text', 'label' => 'Slogan');

    $wp_customize->add_section($section, array('title' => 'Info.'));

    // Slogan
    $wp_customize->add_setting('slogan_setting');
    $wp_customize->add_control('slogan_setting', $slogan);

    // Email
    $wp_customize->add_setting('email_setting');
    $wp_customize->add_control('email_setting', $email);

    // Twitter
    $wp_customize->add_setting('twitter_setting');
    $wp_customize->add_control('twitter_setting', $twitter);

    // Facebook
    $wp_customize->add_setting('facebook_setting');
    $wp_customize->add_control('facebook_setting', $facebook);

    // Instagram
    $wp_customize->add_setting('skype_setting');
    $wp_customize->add_control('skype_setting', $skype);
}

add_action('customize_register', 'odyssey_customizer');
