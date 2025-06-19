<?php

    $attr = $args['attributes'];
    $content = (isset($args['content']) ? $args['content'] : '');

    $intro = $attr['intro'] ?? '';

    $style = (isset($attr['style']) ? $attr['style'] : []);

    // dd($style);

    $padding_classes = RWD_GutenbergHelpers::get_padding_classes($style);
    $color_classes = RWD_GutenbergHelpers::get_color_classes($attr);

    $theme = (isset($attributes['theme']) ? $attributes['theme'] : 'main');

?>

<div class="intro-section-centered is-theme-<?php echo $theme; ?> bg-light <?php echo $padding_classes; ?> <?php echo $color_classes; ?>">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-7 text-center">

                <div data-aos="fade-up" data-aos-duration="1000">
                    <?php if($intro) { ?>
                        <?php echo wpautop($intro); ?>
                    <?php } ?>

                    <?php if($content) { ?>
                        <?php echo $content; ?>
                    <?php } ?>
                </div>

            </div>
        </div>

    </div>
</div>