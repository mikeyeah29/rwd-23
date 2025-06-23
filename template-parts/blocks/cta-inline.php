<?php

    $attrs = $args['attributes'] ?? [];

    $text = $attrs['text'] ?? 'Ready to Get Started?';
    $buttonText = $attrs['buttonText'] ?? 'Book a FREE Call';
    $buttonUrl = $attrs['buttonUrl'] ?? '';
    $addTopPadding = $attrs['addTopPadding'] ?? true;

    $style = $attrs['style'] ?? [];
    $padding_classes = RWD_GutenbergHelpers::get_padding_classes($style);
    $color_classes = RWD_GutenbergHelpers::get_color_classes($attrs);
    $text_color_class = RWD_GutenbergHelpers::get_text_color_class($attrs);

    $animation_speed = '400';

?>

<div class="cta-inline-block <?php echo $padding_classes; ?> <?php echo $color_classes; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <div data-aos="fade-up" data-aos-duration="<?php echo esc_attr($animation_speed); ?>">

                    <?php if ($text): ?>
                        <p class="txt-large font-default-display <?php echo $addTopPadding ? 'pt-small' : ''; ?> <?php echo $text_color_class; ?>">
                            <?php echo wp_kses_post($text); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($buttonText): ?>
                        <?php if (!empty($buttonUrl)): ?>
                            <a href="<?php echo esc_url($buttonUrl); ?>" class="rwd-btn book-a-call cursor-pointer">
                                <?php echo esc_html($buttonText); ?>
                            </a>
                        <?php else: ?>
                            <div class="rwd-btn book-a-call cursor-pointer">
                                <?php echo esc_html($buttonText); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</div>


