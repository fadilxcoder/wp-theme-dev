<?php
#   MUST USE  PLUGINS CODES

#Functions 
function university_post_types()
{
    // Event post type
    $config = array(
        'public'        => true,                        // Set to true in order to display it
        'labels'        => array(
            'name'          => 'Events',                // Show in menu in WordPress admin dashboard
            'add_new_item'  => 'Add New Event',     
            'edit_item'     => 'Edit Event',
            'all_items'     => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon'     => 'dashicons-calendar-alt',    // Icon of the display text
        'has_archive'   => true,                        // If true, create pages (archive-event, single-event) in theme
        'rewrite'       => array(
            'slug'  =>  'events'                        // Change URL, instead of event => events
        ),
        'supports'      => array('title', 'editor', 'excerpt') // Show screen option in dashboard for events.
    );
    register_post_type('event', $config);
    
    // Campus post type
    $config = array(
        'public'        => true,                        // Set to true in order to display it
        'labels'        => array(
            'name'          => 'Campus',                // Show in menu in WordPress admin dashboard
            'add_new_item'  => 'Add New Campus',     
            'edit_item'     => 'Edit Campus',
            'all_items'     => 'All Campuses',
            'singular_name' => 'Campus'
        ),
        'menu_icon'     => 'dashicons-location-alt',    // Icon of the display text
        'has_archive'   => true,                        // If true, create pages (archive-event, single-event) in theme
        'rewrite'       => array(
            'slug'  =>  'campuses'                        // Change URL, instead of event => events
        ),
        'supports'      => array('title', 'editor', 'excerpt') // Show screen option in dashboard for events.
    );
    register_post_type('campus', $config);
    
    
    // Program post type
    $config = array(
        'public'        => true,                        
        'labels'        => array(
            'name'          => 'Programs',            
            'add_new_item'  => 'Add New Program',     
            'edit_item'     => 'Edit Program',
            'all_items'     => 'All Programs',
            'singular_name' => 'Program'
        ),
        'menu_icon'     => 'dashicons-tablet',    
        'has_archive'   => true,                        
        'rewrite'       => array(
            'slug'  =>  'programs'                        
        ),
        'supports'      => array('title', 'editor')
    );
    register_post_type('program', $config);
    
    // Professor post type
    $config = array(
        'public'        => true,                        
        'labels'        => array(
            'name'          => 'Professor',            
            'add_new_item'  => 'Add New Professor',     
            'edit_item'     => 'Edit Professor',
            'all_items'     => 'All Professors',
            'singular_name' => 'Professor'
        ),
        'menu_icon'     => 'dashicons-businessman',    
        'supports'      => array('title', 'editor', 'thumbnail') // thumbnail -> added in order to set featured image
    );
    register_post_type('professor', $config);
    
} 

# Calling
add_action('init', 'university_post_types'); //New posts types will be available