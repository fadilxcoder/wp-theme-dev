<?php

#Functions
function university_files()
{
    wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('university-main-styles', get_stylesheet_uri(), NULL, microtime(), false);
}

function university_features()
{
    register_nav_menu('headerMenuLocation', 'Header Menu Location'); // Add Menu text in admin sidebar : Appearance > Menus
    register_nav_menu('footerLocationOne', 'Footer Location One');
    register_nav_menu('footerLocationTwo', 'Footer Location Two');
    add_theme_support('title-tag'); // Dynamic Text Title for each page & post
}

# Calling
add_action('wp_enqueue_scripts', 'university_files');
add_action('after_setup_theme', 'university_features');
