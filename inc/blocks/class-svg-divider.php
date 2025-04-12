<?php

namespace RWD\Blocks;

class Svg_Divider_Block {
    public function __construct() {

        add_action('init', [$this, 'register_block']);
    }

    public function register_block() {
        register_block_type('rwd/svg-divider', [
            'render_callback' => [$this, 'render_block'],
        ]);
    }

    public function render_block($attributes, $content, $block) {
        ob_start();
        get_template_part('template-parts/blocks/svg-divider', null, [
            'attributes' => $attributes, 
            'block' => 'block',
            'content' => $content
        ]);
        return ob_get_clean();
    }
}

new Svg_Divider_Block();