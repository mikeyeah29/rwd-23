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




<div class="portfolio-item-simple" style="background-image: url('<?php echo $displayBg; ?>');">
    <a href="<?php the_permalink(); ?>">
        <h2><?php the_title(); ?></h2>
    </a>
    <ul class="portfolio-cats">
        <?php foreach ($cats as $cat) { ?>
            <li><?php echo $cat; ?></li>
        <?php } ?>
    </ul>
</div>
