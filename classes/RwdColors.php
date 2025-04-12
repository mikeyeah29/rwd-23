<?php

define('RWD_COLOR_OXFORD_BLUE', '#02182B');
define('RWD_COLOR_SKY_BLUE', '#68C5DB');
define('RWD_COLOR_DODGER_BLUE', '#0197F6');
define('RWD_COLOR_MUNSELL', '#448FA3');
define('RWD_COLOR_FLAME', '#dd4d17');
define('RWD_COLOR_CRIMSON', '#D7263D');
define('RWD_COLOR_SUCCESS', '#26c45d');

class RwdColors
{
    public static $main = RWD_COLOR_OXFORD_BLUE;
    public static $secondary = RWD_COLOR_SKY_BLUE;
    public static $accent = RWD_COLOR_FLAME;
    public static $success = RWD_COLOR_SUCCESS;

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
