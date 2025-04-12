<?php

namespace RWD;

class GutenbergSetup {

    /**
     * Blocks to wrap in a container.
     *
     * @var array
     */
    private $blocks_to_wrap = [
        'core/columns'
        // 'core/image'
    ];

    /**
     * Constructor to hook into WordPress.
     */
    public function __construct() {
        add_filter('render_block', [$this, 'wrap_block_with_container'], 10, 2);
    }

    public function wrap_block_with_container($block_content, $block) {

        if (!isset($block['blockName']) || !$block['blockName']) {
            return $block_content;
        }

        // Check if the block is in the list
        if (in_array($block['blockName'], $this->blocks_to_wrap, true)) {
            return '<div class="container">' . $block_content . '</div>';
        }

        return $block_content;
    }
}
