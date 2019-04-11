<?php
#   MUST USE  PLUGINS CODES

#Functions 
function university_post_types()
{
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
} 

# Calling
add_action('init', 'university_post_types'); //New posts types will be available