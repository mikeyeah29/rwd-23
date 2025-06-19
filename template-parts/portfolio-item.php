<?php

    $category = getCatName(get_the_ID());
    $shade = 'light'; // dark
    $screenshot = getMeta('main_screenshot');

?>

<div class="portfolio-item-2">
    <a href="<?php the_permalink(); ?>">
        <?php if($screenshot) { ?>
            <div class="browser">
                <div class="browser-bar">
                    <div class="browser-btn"></div>
                    <div class="browser-btn"></div>
                    <div class="browser-btn"></div>
                </div>
                <div class="aspect-ratio">
                    <img src="<?php echo $screenshot; ?>" />
                </div>
            </div>
        <?php } ?>
        <p class="ellipsis"><?php the_title(); ?></p>
    </a>
</div>
