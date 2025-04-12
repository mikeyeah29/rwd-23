<?php
/* Template Name: About */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php include('template-parts/hero.php'); ?>

<div class="bg-white" id="header-invert-point">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-sm-10">

                <div class="about-content">
                    <?php the_content(); ?>
                </div>

            </div>
        </div>

    </div>
</div>

<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
