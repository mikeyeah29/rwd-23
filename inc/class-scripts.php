<?php

namespace RWD;

class Scripts {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_style'] );
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_scripts'] );
        add_action( 'enqueue_block_editor_assets', [$this, 'enqueue_block_editor_assets']);
    }

    // styles and scripts
    public function enqueue_style()
    {
        wp_enqueue_style( 'aos_css', get_template_directory_uri() . '/lib/aos/aos.css' );
        wp_enqueue_style('slick_css', get_template_directory_uri() . '/lib/slick/slick.css');

        wp_enqueue_style( 'variables', get_template_directory_uri() . '/assets/css/variables.css' );
        wp_enqueue_style( 'styles', get_stylesheet_uri() );
        wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );
    }

    public function enqueue_scripts() {
        wp_register_script('aos_js', get_template_directory_uri() . '/lib/aos/aos.js', [], '1.1', true);
        wp_enqueue_script('aos_js');

        wp_register_script('slick_js', get_template_directory_uri() . '/lib/slick/slick.js', array('jquery'), '1.1', true);
        wp_enqueue_script('slick_js');

        wp_register_script('industry_js', get_template_directory_uri() . '/assets/js/industry.js', array('jquery', 'slick_js'), '1.1', true);
        wp_enqueue_script('industry_js');

        wp_register_script('front_page_js', get_template_directory_uri() . '/assets/js/front-page.js', array('aos_js', 'slick_js'),'1.1', true);
        wp_enqueue_script('front_page_js');
    }

    /**
     * Enqueue block editor assets for Gutenberg.
     */
    public function enqueue_block_editor_assets() {
        // Enqueue Bootstrap CSS for the editor
        wp_enqueue_style(
            'rwd-bootstrap-editor',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
            [],
            null
        );
        // Enqueue the compiled editor styles for Gutenberg blocks
        wp_enqueue_style(
            'rwd-block-editor-style',
            get_stylesheet_directory_uri() . '/assets/css/editor-style.css',
            [],
            filemtime(get_stylesheet_directory() . '/assets/css/editor-style.css')
        );

        // Enqueue the block JavaScript
        wp_enqueue_script(
            'rwd-blocks-js',
            get_stylesheet_directory_uri() . '/build/index.js',
            ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'], // Dependencies
            time(),
            true
        );
    }

}