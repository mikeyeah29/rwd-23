<?php

define('RWD_COLOR_OXFORD_BLUE', '#02182B');
define('RWD_COLOR_SKY_BLUE', '#68C5DB');
define('RWD_COLOR_DODGER_BLUE', '#0197F6');
define('RWD_COLOR_MUNSELL', '#448FA3');
define('RWD_COLOR_FLAME', '#dd4d17');
// define('RWD_COLOR_CRIMSON', '#D7263D');
define('RWD_COLOR_SUCCESS', '#26c45d');

// New Colors 2025
define('RWD_COLOR_BLACK', '#100023');
define('RWD_COLOR_DEEP_SAPPHIRE', '#05175B');
define('RWD_COLOR_BLUE_RIBBON', '#002877');
define('RWD_COLOR_CRIMSON', '#E60951');
define('RWD_COLOR_ORANGE_PEEL', '#FE6E04');
define('RWD_COLOR_WHITE_SAND', '#FFF6EC');
define('RWD_COLOR_PEACH', '#FFF0E7');
define('RWD_COLOR_PEACH_YELLOW', '#FFD3A5');

class RwdColors
{
    // public static $main = RWD_COLOR_OXFORD_BLUE;
    // public static $secondary = RWD_COLOR_SKY_BLUE;
    public static $main = RWD_COLOR_DEEP_SAPPHIRE;
    public static $secondary = RWD_COLOR_BLUE_RIBBON;
    public static $accent = RWD_COLOR_CRIMSON;
    public static $success = RWD_COLOR_SUCCESS;

    public static $dark = RWD_COLOR_BLACK;
    public static $light = RWD_COLOR_WHITE_SAND;

    static public function getMain()
    {
        return Self::$main;
    }

    static public function getSecondary()
    {
        return Self::$secondary;
    }

    static public function getAccent()
    {
        return Self::$accent;
    }

    static public function getSuccess()
    {
        return Self::$success;
    }

    static public function getDark()
    {
        return Self::$dark;
    }

    static public function getLight()
    {
        return Self::$light;
    }
    

    static public function darken($color, $amount) {
        // Remove the '#' symbol if present
        $color = ltrim($color, '#');

        // Split the color into its RGB components
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));

        // Calculate the darken amount for each RGB component
        $darkenAmount = 1 - ($amount / 100);
        $r = max(0, $r * $darkenAmount);
        $g = max(0, $g * $darkenAmount);
        $b = max(0, $b * $darkenAmount);

        // Convert the darkened RGB values back to hex
        $darkenedColor = sprintf('#%02x%02x%02x', $r, $g, $b);

        return $darkenedColor;
    }

    static public function lighten($color, $amount) {
        // Remove the '#' symbol if present
        $color = ltrim($color, '#');

        // Split the color into its RGB components
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));

        // Calculate the lighten amount for each RGB component
        $lightenAmount = 1 + ($amount / 100);
        $r = min(255, $r * $lightenAmount);
        $g = min(255, $g * $lightenAmount);
        $b = min(255, $b * $lightenAmount);

        // Convert the lightened RGB values back to hex
        $lightenedColor = sprintf('#%02x%02x%02x', $r, $g, $b);

        return $lightenedColor;
    }
}

?>
