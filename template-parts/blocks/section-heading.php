<?php
    
    $attrs = $args['attributes'] ?? [];

    $eyebrow = $attrs['eyebrow'] ?? '';
    $heading = $attrs['heading'] ?? '';

    $supporting_text = $attrs['supportingText'] ?? '';

    $textAlign = $attrs['textAlign'] ?? 'center';
    $backgroundColor = $attrs['backgroundColor'] ?? 'white';
    
    $largeHeading = $attrs['largeHeading'] ?? true;
    $headingSizeClass = $largeHeading ? 'txt-xxlarge' : 'txt-xlarge';

    $style = (isset($attrs['style']) ? $attrs['style'] : []);
    $padding_classes = RWD_GutenbergHelpers::get_padding_classes($style);

    $color_classes = RWD_GutenbergHelpers::get_color_classes($attrs);
    $text_color = RWD_GutenbergHelpers::get_text_color_class($attrs) ?? 'txt-dark';

    $eyebrow_color = RWD_GutenbergHelpers::get_eyebrow_color_class($attrs) ?? 'txt-blue-ribbon';

?>

<div class="position-relative <?php echo $padding_classes; ?> <?php echo $color_classes; ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($eyebrow): ?>
                    <p class="font-small-heading mb-0 text-<?php echo esc_attr($textAlign); ?> <?php echo esc_attr($eyebrow_color); ?>">
                        <?php echo esc_html($eyebrow); ?>
                    </p>
                <?php endif; ?>
                <?php if ($heading): ?>
                    <h2 class="hdln-2 text-<?php echo esc_attr($textAlign); ?> <?php echo esc_attr($headingSizeClass); ?> <?php echo esc_attr($text_color); ?>">
                        <?php echo esc_html($heading); ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($supporting_text): ?>
            <div class="row d-flex justify-content-center">
                <div class="col-sm-7 text-center">
                    <p class="text-center mb-5"><?php echo esc_html($supporting_text); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
