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
