<?php

$attrs = $args['attributes'] ?? [];
$content = $args['content'] ?? '';

$icon = $attrs['iconUrl'] ?? '';
$title = $attrs['text'] ?? '';

?>

<div class="col-md-4 icon-item text-center mb-4">
    <?php if ($icon): ?>
        <div class="icon-item__icon mb-3">
            <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>" />
        </div>
    <?php endif; ?>

    <?php if ($title): ?>
        <h3 class="icon-item__title font-small-heading txt-medium mb-2"><?php echo esc_html($title); ?></h3>
    <?php endif; ?>

    <?php if ($content): ?>
        <p class="icon-item__content"><?php echo wp_kses_post($content); ?></p>
    <?php endif; ?>
</div>
