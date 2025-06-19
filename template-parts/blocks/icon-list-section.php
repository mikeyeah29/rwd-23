<?php

$attr = $args['attributes'];
$content = $args['content'];

$style = (isset($attr['style']) ? $attr['style'] : []);

$padding_classes = RWD_GutenbergHelpers::get_padding_classes($style);
$color_classes = RWD_GutenbergHelpers::get_color_classes($attr);

$eyebrow = $attr['subheading'] ?? '';
$heading = $attr['heading'] ?? '';

?>

<div class="icon-list-section <?php echo $padding_classes; ?> <?php echo $color_classes; ?>">
    <div class="container">
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-12">
                <?php if ($eyebrow): ?>
                    <p class="font-small-heading mb-0 text-center txt-blue-ribbon">
                        <?php echo esc_html($eyebrow); ?>
                    </p>
                <?php endif; ?>
                <?php if ($heading): ?>
                    <h2 class="hdln-2 text-center txt-xlarge txt-rwd-black">
                        <?php echo esc_html($heading); ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1000">
            <?php echo $content; ?>
        </div>
    </div>
</div>

