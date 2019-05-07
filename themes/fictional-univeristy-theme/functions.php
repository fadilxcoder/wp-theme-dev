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
    add_theme_support('post-thumbnails'); // Add in order to have upload thumbnail functionality in admin panel
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
}

function university_adjust_queries($query)
{
    /* Below Query explained :
    *
    *  > !is_admin() ->  will not be executed in Admin section
    *
    *  > is_post_type_archive('event') ->  will check if the post type of this archive is "event"
    *  
    *  > $query->is_main_query() -> will check if this is the main query (Default URL based query) and not a custom query
    *
    */
    if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query() ):
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');       # Order By name
        $query->set('order', 'ASC');                    # Into ASC order
        
        $today = date('Ymd');
        $query->set('meta_query',   array(
                                        array(
                                            'key'       => 'event_date',        # WHERE key {'event_date'}
                                            'compare'   => '>=',                # compare {IS '>=' (greater or equal to)}
                                            'value'     => $today,              # value {today's date} 
                                            'type'      => 'numeric'            # type of value to compare {'numeric'}
                                        )    
                                    )
        );
    endif;
    
    if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query() ):
        $query->set('orderby', 'title');    # Order By name
        $query->set('order', 'ASC');        # Into ASC order
        $query->set('posts_per_page', -1);
    endif;
}

# Calling
add_action('wp_enqueue_scripts', 'university_files');
add_action('after_setup_theme', 'university_features');
add_action('pre_get_posts', 'university_adjust_queries');
