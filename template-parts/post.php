<div class="portfolio-item portfolio-item--light">

    <?php

        $cats = getCats(get_the_ID());

    ?>

    <div class="tags">
        <?php foreach ($cats as $cat) { ?>
            <div class="cat-tag"><?php echo $cat; ?></div>
        <?php } ?>
    </div>

    <!-- <img class="portfolio-item__img" src="https://picsum.photos/600" /> -->
    <div class="portfolio-item__img">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="portfolio-item__details">
        <a href="<?php the_permalink(); ?>" class="d-flex justify-content-between align-items-center portfolio_link">
            <p><?php the_title(); ?></p>
            <img class="portfolio-item__more" src="<?php echo get_template_directory_uri() . '/img/arrow-dark.png'; ?>" />
        </a>
    </div>
</div>
