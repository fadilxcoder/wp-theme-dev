<?php
#   MUST USE  PLUGINS 

#Functions 
function university_post_types()
{
    $config = array(
        'public'    => true,    
        'labels'    => array(
            'name'          => 'Events',
            'add_new_item'  => 'Add New Event',
            'edit_item'     => 'Edit Event',
            'all_items'     => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar-alt'
    );
    register_post_type('event', $config);
} 

# Calling
add_action('init', 'university_post_types'); //New posts types will be available