<?php

include('RwdCustomMetaBox.php');

class RwdCPT
{
    public function custom_taxonomy_skill() {

        $labels = array(
            'name'                       => _x( 'Skills', 'Taxonomy General Name', 'text_domain' ),
            'singular_name'              => _x( 'Skill', 'Taxonomy Singular Name', 'text_domain' ),
            'menu_name'                  => __( 'Skills', 'text_domain' ),
            'all_items'                  => __( 'All Skills', 'text_domain' ),
            'parent_item'                => __( 'Parent Skill', 'text_domain' ),
            'parent_item_colon'          => __( 'Parent Skill:', 'text_domain' ),
            'new_item_name'              => __( 'New Skill Name', 'text_domain' ),
            'add_new_item'               => __( 'Add New Skill', 'text_domain' ),
            'edit_item'                  => __( 'Edit Skill', 'text_domain' ),
            'update_item'                => __( 'Update Skill', 'text_domain' ),
            'view_item'                  => __( 'View Skill', 'text_domain' ),
            'separate_items_with_commas' => __( 'Separate skills with commas', 'text_domain' ),
            'add_or_remove_items'        => __( 'Add or remove skills', 'text_domain' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
            'popular_items'              => __( 'Popular Skills', 'text_domain' ),
            'search_items'               => __( 'Search Skills', 'text_domain' ),
            'not_found'                  => __( 'Not Found', 'text_domain' ),
            'no_terms'                   => __( 'No skills', 'text_domain' ),
            'items_list'                 => __( 'Skills list', 'text_domain' ),
            'items_list_navigation'      => __( 'Skills list navigation', 'text_domain' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy( 'skill', array( 'portfolio-item' ), $args );

    }

    function create_products() {

        register_post_type( 'portfolio-item',
        // CPT Options
            array(
                'labels' => array(
                    'name' => __( 'Portfolio Items' ),
                    'singular_name' => __( 'portfolio-item' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'portfolio-items'),
                'menu_icon'           => 'dashicons-superhero-alt',
                'map_meta_cap' => true,
                'supports' => array(
                    /* Post titles ($post->post_title). */
                    'title',

                    /* Post content ($post->post_content). */
                    'editor',

                    /* Displays the Custom Fields meta box. Post meta is supported regardless. */
                    'custom-fields',

                    /* Displays the Attributes meta box with a parent selector and menu_order input box. */
                    'page-attributes',

                    /* Displays the Format meta box and allows post formats to be used with the posts. */
                    'post-formats',

                    'thumbnail'
                ),
                'taxonomies' => array('skill')
            )
        );

        $product_meta = new RwdCustomMetaBox( 'display_bg', 'Display Background', array(
            array(
                'label' => 'Display Background',
                'id'    => 'display_bg',
                'desc'  => '',
                'type'  => 'image'
            )
        ), 'portfolio-item' );

        $product_meta = new RwdCustomMetaBox( 'main_screenshot', 'Main Screenshot', array(
            array(
                'label' => 'Main Screenshot',
                'id'    => 'main_screenshot',
                'desc'  => '',
                'type'  => 'image'
            ),
            array(
                'label' => 'Screenshot Name',
                'id'    => 'main_screenshot_name',
                'desc'  => '',
                'type'  => 'text'
            )
        ), 'portfolio-item' );

        $product_meta = new RwdCustomMetaBox( 'second_screenshot', 'Second Screenshot', array(
            array(
                'label' => 'Screenshot Two',
                'id'    => 'screenshot_two',
                'desc'  => '',
                'type'  => 'image'
            ),
            array(
                'label' => 'Screenshot Name',
                'id'    => 'screenshot_two_name',
                'desc'  => '',
                'type'  => 'text'
            )
        ), 'portfolio-item' );

        $product_meta = new RwdCustomMetaBox( 'third_screenshot', 'Third Screenshot', array(
            array(
                'label' => 'Screenshot Three',
                'id'    => 'screenshot_three',
                'desc'  => '',
                'type'  => 'image'
            ),
            array(
                'label' => 'Screenshot Name',
                'id'    => 'screenshot_three_name',
                'desc'  => '',
                'type'  => 'text'
            )
        ), 'portfolio-item' );

    }

    public function __construct()
    {
        // add cpts
        add_action( 'init', array($this, 'create_products') );
        add_action( 'init', array($this, 'custom_taxonomy_skill') );
    }
}

?>
