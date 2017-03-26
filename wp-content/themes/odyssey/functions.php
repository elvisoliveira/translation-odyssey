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
    $style = array('base', 'home');

    foreach ($style as $value)
    {
        wp_enqueue_style($value, get_template_directory_uri() . "/styles/{$value}.css");
    }

    // CSS: Font Awesome
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css');

    // JS
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/jquery/jquery.js');
    wp_enqueue_script('jquery-cycle', get_template_directory_uri() . '/assets/jquery-cycle/index.js');
    wp_enqueue_script('base', get_template_directory_uri() . '/scripts/base.js', '', '', true);
}

add_action('wp_enqueue_scripts', 'odyssey_scripts');

// Google Fonts
function odyssey_google_fonts()
{
    wp_register_style('OpenSans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
    wp_enqueue_style('OpenSans');

    wp_deregister_style('grunion.css');
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

// Custom post type behavior.
// Make it unable to ope specific pages.
function template_redirect()
{
    if (is_single() && in_array(get_query_var('post_type'), array('team', 'banner', 'services')))
    {
        wp_redirect(home_url(), 301);
    }
}

add_action('template_redirect', 'template_redirect');

// Make the initial pages undeleatable.
// https://goo.gl/mTmmA3
function restrict_post_deletion($post_id)
{
    if (in_array($post_id, array(1, 2, 3, 4, 5)))
    {
        if (wp_redirect(html_entity_decode(get_edit_post_link($post_id))))
        {
            exit();
        }
    }
}

add_action('wp_trash_post', 'restrict_post_deletion', 10, 1);
add_action('before_delete_post', 'restrict_post_deletion', 10, 1);

// Image sizes
add_image_size('banner-home', 1000, 450, true);
add_image_size('post-home', 300, 225, true);

// Thumbnail support
add_theme_support('post-thumbnails');

// Define the front-page.
// Jetpack contact form plugin requires a post or widget to be rendered.
update_option('page_on_front', get_page_by_path('home')->ID);
update_option('show_on_front', 'page');

