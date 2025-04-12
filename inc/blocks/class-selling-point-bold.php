<?php

namespace RWD\Blocks;

class Selling_Point_Bold {
    public function __construct() {

        add_action('init', [$this, 'register_block']);
    }

    public function register_block() {
        register_block_type('rwd/selling-point-bold', [
            'render_callback' => [$this, 'render_block'],
        ]);
    }

    public function render_block($attributes, $content, $block) {
        ob_start();
        get_template_part('template-parts/blocks/selling-point-bold', null, [
            'attributes' => $attributes, 
            'block' => 'block',
            'content' => $content
        ]);
        return ob_get_clean();
    }
}

new Selling_Point_Bold();