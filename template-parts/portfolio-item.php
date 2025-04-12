<?php

    $category = getCatName(get_the_ID());
    $shade = 'light'; // dark
    $screenshot = getMeta('main_screenshot');

?>


<!-- <div class="col-md-6 col-lg-4">
    <div class="portfolio-item <?php // echo ( $shade === 'light' ? 'portfolio-item--light' : '' ) ?>">
        <div class="portfolio-item__img">
            <?php // the_post_thumbnail(); ?>
            <?php // if($screenshot) { ?>
                <img class="portfolio-item__img--site" src="<?php // echo $screenshot; ?>" />
            <?php // } ?>
        </div>
        <div class="portfolio-item__details">
            <a href="<?php // the_permalink(); ?>" class="d-flex justify-content-between align-items-center portfolio_link">
                <p class="ellipsis"><?php // the_title(); ?></p>
                <?php //if($shade === 'light') { ?>
                    <img class="portfolio-item__more" src="<?php //echo get_template_directory_uri() . '/img/arrow-dark.png'; ?>" />
                <?php //}else { ?>
                    <img class="portfolio-item__more" src="<?php //echo get_template_directory_uri() . '/img/arrow.png'; ?>" />
                <?php //} ?>
            </a>
        </div>
    </div>
</div> -->

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
