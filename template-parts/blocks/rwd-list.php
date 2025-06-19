<?php

$attr = $args['attributes'];
$style = isset($attr['style']) ? $attr['style'] : [];

$items = $attr['items'] ?? [];

$padding_classes = RWD_GutenbergHelpers::get_padding_classes($style);

$color_classes = RWD_GutenbergHelpers::get_color_classes($attr);
$text_color = RWD_GutenbergHelpers::get_text_color_class($attr) ?? 'txt-dark';

$svg_colors = [
    // 'primary' => '#C30062',
    // 'secondary' => '#002877',
    'primary' => '#FE6E04',
    'secondary' => '#E60951',
];

?>

<div class="rwd-list <?php echo $padding_classes; ?> <?php echo $color_classes; ?>">
    <?php foreach ($items as $item) : ?>
        <div class="rwd-list__item">
            <svg width="32" height="32" viewBox="0 0 202 202" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M183.946 86.717C184.67 91.3798 185.167 96.1268 185.167 101C185.167 152.131 143.715 193.583 92.5833 193.583C41.4521 193.583 0 152.131 0 101C0 49.8688 41.4521 8.41675 92.5833 8.41675C112.346 8.41675 130.61 14.6535 145.642 25.1912L133.682 37.4542C121.831 29.7698 107.733 25.2501 92.5833 25.2501C50.8114 25.2501 16.8333 59.2366 16.8333 101C16.8333 142.764 50.8114 176.75 92.5833 176.75C133.775 176.75 167.315 143.689 168.249 102.726L183.946 86.717ZM175.942 18.239L96.7917 99.3672L64.4464 68.9494L38.3968 95.0243L96.7917 151.5L202 44.297L175.942 18.239Z" fill="url(#paint0_linear_50_123)"/>
                <defs>
                <linearGradient id="paint0_linear_50_123" x1="101" y1="8.41675" x2="101" y2="193.583" gradientUnits="userSpaceOnUse">
                <stop stop-color="<?php echo $svg_colors['primary']; ?>"/>
                <stop offset="1" stop-color="<?php echo $svg_colors['secondary']; ?>"/>
                </linearGradient>
                </defs>
            </svg>
             <div class="rwd-list__item-title <?php echo $text_color; ?>">
                <p class="<?php echo $text_color; ?>"><?php echo $item['text']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>