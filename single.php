<?php get_header(); ?>

<div class="blog-single bg-pattern-blue top-padding pb-5">

    <div class="container">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="row">

                <div class="col-sm-12 ">

                    <?php

                        echo createBreadcrumbs([
                            ['href' => '/', 'text' => 'Home'],
                            ['href' => '/blog', 'text' => 'Blog'],
                            ['href' => '/', 'text' => get_the_title()],
                        ]);

                    ?>

                    <div class="blog-page-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>

                </div>

            </div>

            <div class="portfolio-page-content" id="header-invert-point">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9">

                        <h1><?php the_title(); ?></h1>

                        <?php the_content(); ?>

                    </div>

                    <!-- <div class="col-sm-4">
                        <div class="blog-sidebar">
                            <?php // include('template-parts/widgets/related-posts.php'); ?>
                        </div>
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

        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>

    </div>

</div>

<?php

    /*

        Current Services ( Promo's )
        - Web Development
        - Web Maintainence

        Blog Categories
        - Design
        - CSS
        - Front End
        - Security
        - WordPress
        - Business

    */

    // generic web development promo
    $args = [
        'title' => 'Looking to enhance your online presence?',
        'body' => 'Get in touch today and let\'s get your ideas online.',
        'btn-text' => 'Contact Me',
        'btn-link' => home_url() . '/contact'
    ];

    if(has_category('security')) {

        // set security promo
        $args['title'] = 'Need Help?';
        $args['body'] = 'Having to think about website security can be a pain, why not let me take on that headache for you? I offer a monthly service in which I manage all technical aspects of your WordPress site.';
        $args['btn-text'] = 'Find Out More';
        $args['btn-link'] = home_url() . '/website-management';

    }else if(has_category('business')){

        // set business
        $args['title'] = 'Website Trouble?';
        $args['body'] = 'Unlock Your True Business Potential & Leave the Technical Burden to Us!';
        $args['btn-text'] = 'Find Out More';
        $args['btn-link'] = home_url() . '/website-management';

    }

    get_template_part('template-parts/banner', 'promo', $args);

?>

<?php get_footer(); ?>
