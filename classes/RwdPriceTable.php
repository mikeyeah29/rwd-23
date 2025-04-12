<?php

class RwdPriceTable {

    public function render_shortcode($atts) {

        // Load the template file
        ob_start();
        include(get_template_directory() . '/template-parts/pricing-table.php');
        $template_content = ob_get_clean();

        return $template_content;

    }

    public function __construct() {
        add_shortcode('rwd_price_table', array($this, 'render_shortcode'));
    }

}
