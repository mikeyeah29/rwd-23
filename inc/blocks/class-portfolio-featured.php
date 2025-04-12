<?php

namespace RWD\Blocks;

class Portfolio_Featured {
    public function __construct() {

        add_action('init', [$this, 'register_block']);
    }

    public function register_block() {
        register_block_type('rwd/portfolio-featured', [
            'render_callback' => [$this, 'render_block'],
        ]);
    }

    public function render_block($attributes, $content, $block) {
        ob_start();
        get_template_part('template-parts/blocks/portfolio-featured', null, [
            'attributes' => $attributes, 
            'block' => 'block',
            'content' => $content
        ]);
        return ob_get_clean();
    }
}

new Portfolio_Featured();