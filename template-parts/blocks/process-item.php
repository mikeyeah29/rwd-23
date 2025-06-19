<?php

// dd($args);

$attrs = $args['attributes'] ?? [];
$content = $args['content'] ?? '';

$number = $attrs['number'] ?? '';
$title = $attrs['title'] ?? '';
$description = $attrs['description'] ?? '';

$text_color_class = RWD_GutenbergHelpers::get_text_color_class($attrs);
$number_bg_color_class = (isset($attrs['numberBgColor']) ? 'has-' . $attrs['numberBgColor'] . '-background-color' : '');

$theme = $attrs['theme'] ?? 'main';
$heading_class = RWD_Theme_Styles::get($theme, 'display-font');

if($number_bg_color_class == 'has-orange-peel-background-color') {
    $heading_class .= ' has-peach-color';
}

?>

<div class="col-md-4">
    <div class="card aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
        <div class="card-body <?php echo $text_color_class; ?>">
            <div class="font-brand has-secondary-background-color <?php echo $number_bg_color_class; ?> number"><?php echo $number; ?></div>
            <h3 class="process-item-title <?php echo $heading_class; ?>"><?php echo $title; ?></h3>
            <p class="card-text <?php echo $text_color_class; ?>"><?php echo $description; ?></p>
        </div>
    </div>
</div>