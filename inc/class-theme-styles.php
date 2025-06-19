<?php

class RWD_Theme_Styles {

    static $themes = [
        'main' => [
            'display-font' => 'font-alternate',
            'body-font' => 'font-body',
        ],
        'alt' => [
            'display-font' => 'font-heading',
            'body-font' => 'font-body',
        ]
    ];

    static public function get_theme_names() {
        return array_keys(self::$themes);
    }

    static public function get($theme_name = 'main', $type = 'heading') {

        $theme_class = (isset(self::$themes[$theme_name][$type]) ? self::$themes[$theme_name][$type] : self::$themes['main']['heading']);  

        return $theme_class;

    }

}

?>