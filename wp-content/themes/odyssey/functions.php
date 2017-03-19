<?php

// ACF
define('ACF_LITE', TRUE);

include_once('advanced-custom-fields.php');

// Generated Post Types
foreach (glob(dirname(__FILE__) . '/post-types/*.php') as $filename)
{
    include_once($filename);
}

// Scripts and Styles
function odyssey_scripts()
{
    // CSS: Main
    wp_enqueue_style('base', get_template_directory_uri() . '/styles/base.css');
    wp_enqueue_style('home', get_template_directory_uri() . '/styles/home.css');

    // CSS: Font Awesome
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css');

    // JS
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/jquery/jquery.js');
    wp_enqueue_script('jquery-cycle', get_template_directory_uri() . '/assets/jquery-cycle/index.js');
    wp_enqueue_script('base', get_template_directory_uri() . '/scripts/base.js');
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

// Custom post type behavior
function template_redirect()
{
    if (is_single() && in_array(get_query_var('post_type'), array('team', 'banner', 'services')))
    {
        wp_redirect(home_url(), 301);
    }
}

add_action('template_redirect', 'template_redirect');

// Image Sizes
add_image_size('banner-home', 1000, 450, true);
