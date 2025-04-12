<?php

namespace RWD\Blocks;

class Section_Heading {
    public function __construct() {

        add_action('init', [$this, 'register_block']);
    }

    public function register_block() {
        register_block_type('rwd/section-heading', [
            'render_callback' => [$this, 'render_block'],
        ]);
    }

    public function render_block($attributes, $content, $block) {
        ob_start();
        get_template_part('template-parts/blocks/section-heading', null, [
            'attributes' => $attributes, 
            'block' => 'block',
            'content' => $content
        ]);
        return ob_get_clean();
    }
}

new Section_Heading();