<?php

$pos = $args['position'];
$headline = $args['headline'];
$content = $args['content'];
$img = get_template_directory_uri() . '/img/' . $args['img'];
$bg_color = ( isset($args['bg_color']) ? $args['bg_color'] : 'grey' );
$btn_color = ( isset($args['btn_color']) ? 'rwd-btn--' . $args['btn_color'] : '' );

$arrowColor = RwdColors::getAccent();
$scrollToID = ( isset($args['scrollToID']) ? $args['scrollToID'] : '#contact-packages' );

?>

<div class="bg-pattern-<?php // echo $bg_color; ?>" style="background-repeat: no-repeat; background-position: center; background-size: cover;">
<div class="promo-2 <?php echo ($pos === 'right' ? 'promo-2--right' : ''); ?>" style="background-image: url(<?php echo $img; ?>);">
    <div class="container">
        <div class="promo-2__inner <?php echo ($pos === 'right' ? 'promo-2__inner__right' : ''); ?>">
            <div class="promo-2__txt" data-aos="<?php echo ($pos === 'right' ? 'fade-right' : 'fade-left'); ?>">
                <h2 class="heading-lg"><?php echo $headline; ?></h2>
                <p><?php echo $content; ?></p>
                <!-- <a href="#" class="rwd-btn rwd-btn--small <?php echo $btn_color; ?>">Let's Talk</a> -->
                <div onclick="smoothScrollTo('<?php echo $scrollToID; ?>')" class="cursor-pointer d-flex align-items-center">
                    <p class="m-0 txt-accent mr-2 txt-bold">Get Started</p>
                    <?php get_template_part('template-parts/svg', 'arrow', ['color' => $arrowColor]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!--

Flat 2D illustration of a man using a laptop on a table, in his home, sitting on a chair, minimalistic,
vector art, dark blues, orange accent color, white background, white space –ar 16:9

Video game pixel art of a shop front, use dark blues and oragne accent minimalistic,
vector art, white background, dark blue and orange accent colors, white space –ar 16:9

A low detail flat illustration of a coffee shop, white background

-->
