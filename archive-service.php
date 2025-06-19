<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php get_template_part('template-parts/blocks/hero', 'hero', [
        'title' => get_the_title(),
        'content' => get_the_excerpt(),
        'image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
        'button_text' => 'Book a Call',
        'button_url' => '#form-section'
    ]); ?>

<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
