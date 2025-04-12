<?php $screenshot = getMeta($args['meta_name']); ?>

<?php if($screenshot) { ?>

    <div class="portfolio-page-screen-shot">
        <img src="<?php echo $screenshot; ?>" />
        <p><?php echo getMeta($args['meta_name'] . '_name'); ?></p>
    </div>

<?php } ?>
