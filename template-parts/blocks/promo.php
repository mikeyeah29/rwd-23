<?php

$attr = $args['attributes'];
$content = $args['content'];

$args = $attr;

$pos = ( isset($args['position']) ? $args['position'] : 'left' );
$headline = ( isset($args['headline']) ? $args['headline'] : '' );
$img = ( isset($args['img']) ? $args['img'] : '' );
$bg_color = ( isset($args['bg_color']) ? $args['bg_color'] : 'grey' );
$btn_color = ( isset($args['btn_color']) ? 'rwd-btn--' . $args['btn_color'] : '' );

$arrowColor = '#FE6E04'; // RwdColors::getAccent();

$link = ( isset($args['link']) ? $args['link'] : '#contact-packages' );
$button_text = ( isset($args['buttonText']) ? $args['buttonText'] : 'Find Out More' );

$style = (isset($args['style']) ? $args['style'] : []);
$padding_classes = RWD_GutenbergHelpers::get_padding_classes($style);
$color_classes = RWD_GutenbergHelpers::get_color_classes($args);

$text_color = RWD_GutenbergHelpers::get_text_color_class($args) ?? 'txt-dark';

?>

<div class="promo-block <?php echo $padding_classes; ?> <?php echo $color_classes; ?>">
    <div class="promo-2 <?php echo ($pos === 'right' ? 'promo-2--right' : ''); ?>" style="background-image: url(<?php echo $img; ?>);">
        <div class="container">
            <div class="promo-2__inner <?php echo ($pos === 'right' ? 'promo-2__inner__right' : ''); ?>">
                <div class="promo-2__txt <?php echo $color_classes; ?>" data-aos="<?php echo ($pos === 'right' ? 'fade-right' : 'fade-left'); ?>">
                    
                    <h2 class="heading-lg <?php echo $text_color; ?>"><?php echo $headline; ?></h2>

                    <p class="<?php echo $text_color; ?>"><?php echo $content; ?></p>

                    <?php if(strpos($link, '#') === 0) { ?>
                        <div onclick="smoothScrollTo('<?php echo $link; ?>')" class="cursor-pointer d-flex align-items-center">
                            <p class="m-0 txt-accent-secondary mr-2 txt-bold <?php echo $text_color; ?>"><?php echo $button_text; ?></p>
                            <div class="rotate-90">
                                <?php get_template_part('template-parts/svg', 'arrow', ['color' => $arrowColor]); ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <a href="<?php echo $link; ?>" class="cursor-pointer d-flex align-items-center">
                            <p class="m-0 txt-accent-secondary mr-2 txt-bold <?php echo $text_color; ?>"><?php echo $button_text; ?></p>
                            <div class="rotate-90">
                                <?php get_template_part('template-parts/svg', 'arrow', ['color' => $arrowColor]); ?>
                            </div>
                        </a>
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>