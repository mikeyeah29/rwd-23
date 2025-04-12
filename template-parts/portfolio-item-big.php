<?php

    $category = getCatName(get_the_ID());
    $shade = 'light'; // dark
    $screenshot = getMeta('main_screenshot');

    $displayBg = getMeta('display_bg');

    $bgUrl = ( $displayBg ? $displayBg : get_bloginfo('template_url') . '/img/bg-4.png' );

    $bgStyle = "background: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0)), url('" . $bgUrl . "') center/cover no-repeat;";

    // $cats = getCats(get_the_ID()); // ['WordPress', 'API Integration'];
    $cats = getSkills(get_the_ID());

?>

<div class="portfolio-item-big" style="<?php echo $bgStyle; ?>">

    <div class="row">
        <div class="col-sm-6 d-flex align-items-center">
            <div data-aos="fade-right">
                <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                </a>
                <ul class="portfolio-cats">
                    <?php foreach ($cats as $cat) { ?>
                        <li><?php echo $cat; ?></li>
                    <?php } ?>
                </ul>
                <p class="mt-4"><?php the_field('excerpt'); ?></p>
            </div>
        </div>
        <div class="col-sm-6">
            <?php if($screenshot) { ?>
                <a href="<?php the_permalink(); ?>">
                    <div class="browser" data-aos="flip-down" data-aos-delay="300">
                        <div class="browser-bar">
                            <div class="browser-btn"></div>
                            <div class="browser-btn"></div>
                            <div class="browser-btn"></div>
                        </div>
                        <div class="aspect-ratio">
                            <img src="<?php echo $screenshot; ?>" />
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>

</div>
