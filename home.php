<?php get_header(); ?>

<?php get_template_part('template-parts/blocks/hero', null, [
    'splash' => false,
    'headline' => 'Blog'
]); ?>

<div class="bg-rwd-section py-6" id="header-invert-point">
    <div class="container">

        <!-- <div class="hero">

            <h1 id="typedtext">Blog</h1>

        </div> -->

        <div class="row">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="col-md-6">

                    <?php include('template-parts/post.php'); ?>

                </div>

            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

            <!-- <div class="col-sm-4">
                <?php // get_sidebar(); ?>
            </div> -->
        </div>

        <div class="rwd-pagination">
            <?php wp_pagination(); ?>
        </div>

    </div>

</div>

<?php

    get_template_part('template-parts/banner', 'promo', [
        'title' => 'Looking to enhance your online presence?',
        'body' => 'Get in touch today and let\'s get your ideas online.',
        'btn-text' => 'Contact Me',
        'btn-link' => home_url() . '/contact'
    ]);

?>

<?php get_footer(); ?>
