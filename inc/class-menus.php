<?php

namespace RWD;

class Menus {

    public function __construct() {
        add_action('init', [$this, 'register_menus']);
    }

    public function register_menus() {

        register_nav_menus(
            array(
                'main-menu' => __( 'Main Menu' ),
                'catList' => __( 'Category List' ),
                'footer-menu' =>__( 'Footer Menu' )
            )
        );

    }
}