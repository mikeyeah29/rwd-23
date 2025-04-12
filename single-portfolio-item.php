<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="portfolio-page dark-bg">
    <div class="container top-padding">

        <div class="row">

            <div class="col-sm-12 text-center">

                <?php

                    echo createBreadcrumbs([
                        ['href' => '', 'text' => 'Home'],
                        ['href' => '/#header-invert-point', 'text' => 'Portfolio'],
                        ['href' => '/', 'text' => get_the_title()],
                    ]);

                ?>

                <div class="portfolio-page-thumbnail">
                    <?php the_post_thumbnail('full'); ?>
                    <h1 id="typedtext"><?php the_title(); ?></h1>
                </div>


            </div>

        </div>

    </div>
</div>

<div class="container pb-5" id="header-invert-point">

    <div class="portfolio-page-content">

        <div class="row flex justify-content-center">
            <div class="col-lg-8">
                <div class="blog-content">

                    <?php the_content(); ?>

                </div>
            </div>
<!--
            <div class="col-lg-5">

                <?php

                    // get_template_part('template-parts/portfolio', 'screenshot', ['meta_name' => 'main_screenshot']);
                    // get_template_part('template-parts/portfolio', 'screenshot', ['meta_name' => 'screenshot_two']);
                    // get_template_part('template-parts/portfolio', 'screenshot', ['meta_name' => 'screenshot_three']);

                ?>

            </div> -->
        </div>

    </div>

    <div class="post-navigation">
        <?php

            //Retrieve the previous post
            $previous_post = get_previous_post();

            //Check if there is a previous post
            if ( ! empty( $previous_post ) ) {

                //Retrieve the post title
                $previous_post_title = get_the_title( $previous_post );

                //Retrieve the post link
                $previous_post_link = get_permalink( $previous_post );

                //Display the post link
                echo '<a href="'. $previous_post_link .'" class="prev">'. $previous_post_title .'</a>';

            }

            //Retrieve the next post
            $next_post = get_next_post();

            //Check if there is a next post
            if ( ! empty( $next_post ) ) {

                //Retrieve the post title
                $next_post_title = get_the_title( $next_post );
                //Retrieve the post link
                $next_post_link = get_permalink( $next_post );

                //Display the post link

                echo '<a href="'. $next_post_link .'" class="next">'. $next_post_title .'</a>';

            }

        ?>
    </div>

</div>

<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php

    get_template_part('template-parts/banner', 'promo', [
        'title' => 'Looking to enhance your online presence?',
        'body' => 'Get in touch today and let\'s get your ideas online.',
        'btn-text' => 'Contact Me',
        'btn-link' => home_url() . '/contact'
    ]);

?>

<?php get_footer(); ?>
