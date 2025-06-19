<?php

$attrs = $args['attributes'];
$content = $args['content'];

$background = $attrs['backgroundColor'] ?? 'primary';
$textColor = $attrs['textColor'] ?? 'dark';
$verticalAlign = $attrs['verticalAlign'] ?? 'align-items-center';
$heading = $attrs['heading'] ?? '';
$supportingText = $attrs['supportingText'] ?? '';

?>

<div class="position-relative intro-section-block has-<?php echo esc_attr($background); ?>-background-color">

    <div class="container py-5">
        <div class="row <?php echo esc_attr($verticalAlign); ?> justify-content-center">
            <div class="col-md-5" data-aos="fade-up" data-aos-duration="800">
                <?php if (!empty($heading)) : ?>
                    <h2 class="intro-heading has-<?php echo esc_attr($textColor); ?>-color">
                        <?php echo $heading; ?>
                    </h2>
                <?php endif; ?>
                <?php if (!empty($supportingText)) : ?>
                    <p class="intro-supporting-text has-<?php echo esc_attr($textColor); ?>-color">
                        <?php echo $supportingText; ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="col-md-5" data-aos="fade-left" data-aos-duration="800" data-aos-delay="500">
                <div class="intro-content has-<?php echo esc_attr($textColor); ?>-color">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>

</div>