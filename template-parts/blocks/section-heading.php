<?php
    
    $attrs = $args['attributes'] ?? [];

    $eyebrow = $attrs['eyebrow'] ?? '';
    $heading = $attrs['heading'] ?? '';
    $textAlign = $attrs['textAlign'] ?? 'center';
    $backgroundColor = $attrs['backgroundColor'] ?? 'white';
    
    $largeHeading = $attrs['largeHeading'] ?? true;
    $headingSizeClass = $largeHeading ? 'txt-xxlarge' : 'txt-xlarge';

    $style = (isset($attrs['style']) ? $attrs['style'] : []);
    $padding_classes = RWD_GutenbergHelpers::get_padding_classes($style);

?>

<div class="position-relative <?php echo $padding_classes; ?> has-<?php echo esc_attr($backgroundColor); ?>-background-color">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if ($eyebrow): ?>
                    <p class="font-small-heading mb-0 text-<?php echo esc_attr($textAlign); ?> txt-accent">
                        <?php echo esc_html($eyebrow); ?>
                    </p>
                <?php endif; ?>
                <?php if ($heading): ?>
                    <h2 class="hdln-2 txt-dark text-<?php echo esc_attr($textAlign); ?> <?php echo esc_attr($headingSizeClass); ?> txt-primary">
                        <?php echo esc_html($heading); ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
