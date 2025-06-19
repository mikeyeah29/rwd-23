<?php
/**
 * Class to register the "Service" custom post type.
 */
class CPT_Services {

    public function __construct() {
        add_action('init', [$this, 'register_post_type']);
    }

    public function register_post_type() {
        $labels = [
            'name'               => 'Services',
            'singular_name'      => 'Service',
            'menu_name'          => 'Services',
            'name_admin_bar'     => 'Service',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Service',
            'new_item'           => 'New Service',
            'edit_item'          => 'Edit Service',
            'view_item'          => 'View Service',
            'all_items'          => 'All Services',
            'search_items'       => 'Search Services',
            'not_found'          => 'No services found.',
            'not_found_in_trash' => 'No services found in Trash.',
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'has_archive'        => false,
            'rewrite'            => ['slug' => 'services'],
            'show_in_rest'       => true,
            'menu_position'      => 20,
            'menu_icon'          => 'dashicons-hammer', // or change to a custom icon
            'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
            'taxonomies'         => ['category', 'post_tag'],
        ];

        register_post_type('service', $args);
    }
}

// Initialize the custom post type
new CPT_Services();
