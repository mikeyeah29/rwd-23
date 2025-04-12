<?php
/* Template Name: Sales Web */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php
        get_template_part('template-parts/blocks/hero', null, [
            'cta-btn' => 'Book a FREE Call',
            'cta-link' => '#footer_contact'
        ]);
     ?>

<div class="bg-rwd-section" id="header-invert-point">

    <?php

        get_template_part('template-parts/promo', 'two', [
            'position' => 'left',
            'scrollToID' => '#footer_contact',
            'btn_color' => 'grey',
            'img' => 'open.png',
            'headline' => 'Your web site is more than just an online platform',
            'content' => 'It’s your virtual storefront, open 24/7, ready to engage and convert visitors into loyal customers.'
        ]);

        get_template_part('template-parts/promo', 'two', [
            'position' => 'right',
            'scrollToID' => '#footer_contact',
            // 'bg_color' => 'orange',
            'bg_color' => 'grey',
            'img' => 'cred.webp',
            'headline' => 'Establish credibility in the eyes of your customers',
            'content' => 'A well-designed website conveys trust and sets you apart from the competition.'
        ]);

        get_template_part('template-parts/promo', 'two', [
            'position' => 'left',
            'scrollToID' => '#footer_contact',
            // 'bg_color' => 'yellow',
            'bg_color' => 'grey',
            'img' => 'devices.png',
            'headline' => 'For All Devices',
            'content' => 'Whether your visitors are browsing on a smartphone, tablet, or desktop, your website will maintain its visual appeal and functionality, keeping your visitors engaged and satisfied.'
        ]);

        get_template_part('template-parts/promo', 'two', [
            'position' => 'right',
            'scrollToID' => '#footer_contact',
            'bg_color' => 'grey',
            'img' => 'happy2.png',
            'headline' => 'Built with your success in mind',
            'content' => 'Our websites are optimized for search engines, ensuring that your business has the best chance of being found through online searches. This means more visibility, more traffic, and ultimately, more revenue'
        ]);

        get_template_part('template-parts/promo', 'two', [
            'position' => 'left',
            'scrollToID' => '#footer_contact',
            'bg_color' => 'grey',
            'img' => 'code.png',
            'headline' => 'Coding standards & Best Practices',
            'content' => 'Our code strictly adheres to best practices making it easy for other developers to pick up. Everything is modular and scalable, making it easy to add new features and saves you time and resources in the long run.'
        ]);

     ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <?php the_content(); ?>
            </div>
        </div>

    </div>
</div>

<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_template_part('template-parts/contact', 'general'); ?>

<?php get_footer(); ?>
