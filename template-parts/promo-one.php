<?php

$pos = $args['position'];
$headline = $args['headline'];
$content = $args['content'];
$outerImg = get_template_directory_uri() . '/img/2.png';
$img = get_template_directory_uri() . '/img/woo.png';
$bg_color = ( isset($args['bg_color']) ? $args['bg_color'] : 'grey' );
$btn_color = ( isset($args['btn_color']) ? 'rwd-btn--' . $args['btn_color'] : '' );

?>

<div class="bg-pattern-<?php echo $bg_color; ?> promo-1" style="background-image: url(<?php echo $outerImg; ?>);">
    <div class="container">
        <div style="background-image: url(<?php echo $img; ?>);" class="promo-1__inner <?php echo ($pos === 'right' ? 'promo-1__inner__right' : ''); ?>">
            <div class="promo-1__txt">
                <h2 class="heading-lg"><?php echo $headline; ?></h2>
                <p><?php echo $content; ?></p>
                <a href="#" class="rwd-btn rwd-btn--small <?php echo $btn_color; ?>">Let's Talk</a>
            </div>
        </div>
    </div>
</div>
