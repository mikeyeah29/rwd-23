<?php

    $attrs = $args['attributes'] ?? [];
    $title = $attrs['title'] ?? '';
    $text = $attrs['text'] ?? '';

?>

<div class="col-md-4">
    <div class="card" data-aos="fade-up">
        <div class="card-body">
            <?php echo $args['content']; // SVG icon via InnerBlocks ?>
            <?php if ($title): ?>
                <h4 class="card-title font-heading"><?php echo esc_html($title); ?></h4>
            <?php endif; ?>
            <?php if ($text): ?>
                <p class="card-text"><?php echo esc_html($text); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
