<?php get_header(); ?>

<div class="container">

    <h1>Search results for "<?php echo get_search_query(); ?>"</h1>

    <?php

    $search = new WP_Query( array(
        's' => get_search_query(),
        'post_type' => 'post',
    ));

    if ( $search->have_posts() ) {
        while ( $search->have_posts() ) {
            $search->the_post();
            ?>
            <div class="d-flex search-result">
                <?php the_post_thumbnail('thumbnail'); ?>
                <div class="ml-2">
                    <h2 class="search-results-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <?php the_excerpt(); ?>
                </div>
            </div>

            <?php
        }
        wp_reset_postdata();
    } else {
        ?>
        <p><?php _e( 'Sorry, no results found.', 'text-domain' ); ?></p>
        <?php
    }

    ?>

</div>

<?php get_footer(); ?>
