<?php

namespace RWD;

class Blocks {

    /**
     * Constructor to hook into WordPress.
     */
    public function __construct() {
        add_action('init', [$this, 'load_blocks']);
    }

    /**
     * Dynamically load all blocks.
     */
    public function load_blocks() {
        foreach (glob(get_template_directory() . '/inc/blocks/*.php') as $file) {
            require_once $file;
        }
    }
}
