<?php

    $cat = ( isset($args['cat']) ? $args['cat'] : '' );
    $title = ( isset($args['title']) ? $args['title'] : 'Need Help?' );
    $body = ( isset($args['body']) ? $args['body'] : '' );
    $btnText = ( isset($args['btn-text']) ? $args['btn-text'] : 'Find Out More' );
    $btnLink = ( isset($args['btn-link']) ? $args['btn-link'] : '' );

?>

<div class="promo-banner bg-pattern-orange">
    <div class="container">
        <h3><?php echo $title; ?></h3>
        <p><?php echo $body; ?></p>
        <a href="<?php echo $btnLink; ?>" class="rwd-form-btn"><?php echo $btnText; ?></a>
    </div>
</div>
