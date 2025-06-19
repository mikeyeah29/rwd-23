<?php
/* Template Name: Industry */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php

        // $errors = [];
        // $formSubmit = false;

        // if(isset($_POST['rwd_landing_page'])) {

        //     $formSubmit = true;

        //     // Example usage
        //     $errors = [];
        //     $name = sanitize_text_field($_POST['q_name']);
        //     $email = sanitize_email($_POST['q_email']);
        //     $phone = sanitize_text_field($_POST['q_phone']);
        //     $current_site = sanitize_text_field($_POST['q_current_site']);
        //     $msg = sanitize_text_field($_POST['q_msg']);
        //     $recaptchaResponse = $_POST['g-recaptcha-response'];

        //     // Additional validation
        //     if (empty($name)) {
        //       $errors[] = "Name is required.";
        //     }

        //     if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //       $errors[] = "A valid email is required.";
        //     }

        //     if (empty($errors)) {

        //         $formResMsg = RwdMail::send(RWD_ADMIN_EMAIL, 'book-a-call', [
        //             'name' => $name,
        //             'email' => $email,
        //             'phone' => $phone,
        //             'current_site' => $current_site,
        //             'message' => $msg
        //         ]);

        //         $formSent = true;

        //     }else {

        //         $formResMsg = implode('<br>', $errors);

        //     }
        // }

        $featuredImg = get_the_post_thumbnail_url( get_the_ID() );

        $screenshot = getMeta('product_screenshot');
        $screenshot = wp_get_attachment_image_src($screenshot, 'full');
        $screenshot = $screenshot[0];

        $screenshot_two = getMeta('product_screenshot_two');
        if($screenshot_two) {
            $screenshot_two = wp_get_attachment_image_src($screenshot_two, 'full');
            $screenshot_two = $screenshot_two[0];
        }

        $screenshot_three = getMeta('product_screenshot_three');
        if($screenshot_three) {
            $screenshot_three = wp_get_attachment_image_src($screenshot_three, 'full');
            $screenshot_three = $screenshot_three[0];
        }

        $screenshot_four = getMeta('product_screenshot_four');
        if($screenshot_four) {
            $screenshot_four = wp_get_attachment_image_src($screenshot_four, 'full');
            $screenshot_four = $screenshot_four[0];
        }

        $bgProperty = "url(" . $featuredImg . ") center/cover no-repeat";

        // CSS

        $color_primary = '#f6e3cd';
        $color_secondary = '#089B9B';
        $color_light = '#fbf9f8';
        $color_accent = '#f09861';

        $color_primary = getMeta('primary_color');
        $color_secondary = getMeta('secondary_color');
        $color_light = getMeta('light_color');
        $color_accent = getMeta('accent_color');
        $color_dark = getMeta('dark_color');

    ?>

    <style>

      .card-header {
          background: #151515 !important;
      }

      .txt-primary { color: <?php echo $color_primary; ?> !important; }
      .txt-secondary { color: <?php echo $color_secondary; ?> !important; }
      .txt-dark { color: <?php echo $color_dark; ?> !important; }
      .txt-dark h1 { color: <?php echo $color_dark; ?> !important; }

      .bg-primary { background: <?php echo $color_primary; ?> !important; }
      .bg-secondary { background: <?php echo $color_secondary; ?> !important; }
      .bg-light { background: <?php echo $color_light; ?> !important; }
      .bg-dark { background: <?php echo $color_dark; ?> !important; }
      .bg-accent { background: <?php echo $color_accent; ?> !important; }
      .card {
          border: none;
      }

      .font-small-heading {
        font-family: "Karmina", cursive !important;
      }

      /* .card-body {
          background: <?php //echo $color_light; ?>;
      } */

      .header-cta,
      .rwd-btn {
          background: <?php echo $color_accent; ?>;
          transition: 0.3s;
      }

      .header-cta:hover,
      .rwd-btn:before {
          background: <?php echo RwdColors::lighten($color_accent, 10); ?> !important;
      }

      header {
          background: <?php echo $color_dark; ?> !important;
      }

      .package-table-heading {
          /* background: linear-gradient(45deg, <?php // echo $color_secondary; ?>, <?php // echo $color_dark; ?>) !important; */
          background: linear-gradient(45deg, <?php echo $color_secondary; ?>, <?php echo RwdColors::lighten($color_secondary, 20); ?>) !important;
      }

      .package-table-heading-selected {
          background: linear-gradient(45deg, <?php echo $color_accent; ?>, <?php echo RwdColors::lighten($color_accent, 20); ?>) !important;
      }

      .package-btn {
          background: <?php echo $color_secondary; ?> !important;
      }

      .package-btn.is-selected {
          background: <?php echo $color_accent; ?> !important;
      }

      .faq-item.active {
          border-color: <?php echo $color_secondary; ?>;
      }

      .faq-item.active .faq-question {
          background: <?php echo $color_secondary; ?> !important;
          color: <?php echo $color_light; ?> !important;
      }

      .faq-item.active .faq-arrow {
          color: <?php echo $color_light; ?> !important;
      }

    </style>

    <?php if($formSubmit) { ?>

        <div class="form-msg <?php echo ( empty($errors) ? '' : 'error' ); ?>">
            <div class="container">
                <p><?php echo $formResMsg; ?></p>
            </div>
        </div>

    <?php } ?>

    <div class="industry-page top-padding">

        <div class="industry-hero <?php echo ( get_field('overlay') ? 'industry-hero--overlay' : '' ); ?>" style="background: <?php echo $bgProperty; ?>; background-attachment: fixed;">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 txt-dark">
                        <!-- <p class="font-heading industry-hero-sub-line txt-dark"><?php // the_field('hero_pre_heading'); ?></p> -->
                        <p class="font-heading industry-hero-sub-line txt-dark"><?php echo getMeta('hero_pre_heading'); ?></p>

                        <?php echo getMeta('hero_heading'); ?>

                        <div class="find-out-more">
                            <p class="font-heading">Find Out More</p>
                            <img src="<?php bloginfo('template_url'); ?>/img/readmore.png" />
                        </div>

                    </div>
                </div>

                <div class="row d-flex flex-column align-items-center justify-content-center">
                    <div class="col-sm-9">
                        <div data-aos-delay="300" data-aos="fade-up" data-aos-duration="600" data-aos-anchor-placement="top-bottom">
                            <div class="browser">
                                <div class="browser-bar">
                                    <div class="browser-btn"></div>
                                    <div class="browser-btn"></div>
                                    <div class="browser-btn"></div>
                                </div>
                                <div id="browser-screenshots">
                                    <?php if($screenshot) { ?>  
                                        <div><img src="<?php echo esc_url($screenshot); ?>" alt="Browser Screenshot" /></div>
                                    <?php } ?>
                                    <?php if($screenshot_two) { ?>
                                        <div><img src="<?php echo esc_url($screenshot_two); ?>" alt="Browser Screenshot" /></div>
                                    <?php } ?>
                                    <?php if($screenshot_three) { ?>
                                        <div><img src="<?php echo esc_url($screenshot_three); ?>" alt="Browser Screenshot" /></div>
                                    <?php } ?>
                                    <?php if($screenshot_four) { ?>
                                        <div><img src="<?php echo esc_url($screenshot_four); ?>" alt="Browser Screenshot" /></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white position-relative z-3">

            <?php get_template_part('template-parts/blocks/intro-section-centered', null, [
                'attributes' => [
                    'intro' => getMeta('intro')
                ]
            ]); ?>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="<?php echo $color_light; ?>"><path d="M0 100V0h1000v4L0 100z"></path></svg>

            <?php

                $img = getMeta('image_one');
                $img = wp_get_attachment_image_src($img, 'full');
                $img = $img[0];

                get_template_part('template-parts/industry/selling-point', null, [
                    'subheading' => getMeta('pre_heading_one'),
                    'heading' => getMeta('heading_one'),
                    'content' => wpautop(getMeta('selling_point_content_one')),
                    'image' => $img
                    // 'image' => get_bloginfo('template_url') . '/img/icons/t1.png'
                ]);

                $img = getMeta('image_two');
                $img = wp_get_attachment_image_src($img, 'full');
                $img = $img[0];

                get_template_part('template-parts/industry/selling-point', null, [
                    'subheading' => getMeta('pre_heading_two'),
                    'heading' => getMeta('heading_two'),
                    'content' => wpautop(getMeta('selling_point_content_two')),
                    'image' => $img
                    // 'image' => get_bloginfo('template_url') . '/img/icons/t2.png',
                    //'inverted' => true
                ]);

                $img = getMeta('image_three');
                $img = wp_get_attachment_image_src($img, 'full');
                $img = $img[0];

                get_template_part('template-parts/industry/selling-point', null, [
                    'subheading' => getMeta('pre_heading_three'),
                    'heading' => getMeta('heading_three'),
                    'content' => wpautop(getMeta('selling_point_content_three')),
                    'image' => $img
                ]);

                $img = getMeta('image_four');
                $img = wp_get_attachment_image_src($img, 'full');
                $img = $img[0];

                get_template_part('template-parts/industry/selling-point', null, [
                    'subheading' => getMeta('pre_heading_four'),
                    'heading' => getMeta('heading_four'),
                    'content' => wpautop(getMeta('selling_point_content_four')  ),
                    'image' => $img
                    // 'image' => get_bloginfo('template_url') . '/img/icons/t3.png',
                    //'inverted' => true
                ]);

            ?>

        </div>

        <svg xmlns="http://www.w3.org/2000/svg" class="bg-light" viewBox="0 0 1000 100" fill="#FFFFFF"><path d="M0 100V0h1000v4L0 100z"></path></svg>

        <div class="industry-pricing pb-5 bg-light">
            <?php get_template_part('template-parts/industry/pricing-table-full', null, []); ?>
        </div>

        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="bg-primary" viewBox="0 0 1000 100" fill="<?php echo $color_light; ?>"><path d="M0 100V0h1000v4L0 100z"></path></svg> -->

        <!-- <section class="stats-section bg-primary">
            <div class="container pt-5 pb-5">

                <p class="font-heading txt-secondary mb-0 text-center">Statistics</p>
                <h2 class="text-center mb-4 hdln-2 txt-dark">Why Your Website Matters</h2>

                <div class="row d-flex justify-content-center">
                    <div class="col-md-7">
                        <p class="mb-5 text-center">Your website is often the first impression potential clients have of your practice. Here’s why investing in a professional website is essential:</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="stat-card" data-aos="flip-up">
                            <?php // get_template_part('template-parts/industry/pie', null, ['percentage' => 75, 'color' => $color_accent, 'background_color' => $color_dark]); ?>
                            <p class="stat-description">of consumers judge a business's credibility based on their website design.</p>
                            <a href="https://web.stanford.edu/group/webcred/" target="_blank" class="stat-source">Source: Stanford Web Credibility</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stat-card" data-aos="flip-up" data-aos-delay="600">
                            <?php // get_template_part('template-parts/industry/pie', null, ['percentage' => 94, 'color' => $color_accent, 'background_color' => $color_dark]); ?>
                            <p class="stat-description">of first impressions are design-related, making a great website essential.</p>
                            <a href="https://sweor.com/firstimpressions" target="_blank" class="stat-source">Source: Sweor</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stat-card" data-aos="flip-up" data-aos-delay="900">
                            <?php // get_template_part('template-parts/industry/pie', null, ['percentage' => 73, 'color' => $color_accent, 'background_color' => $color_dark]); ?>
                            <p class="stat-description">of people research therapists or life coaches online before booking a session.</p>
                            <a href="https://www.pewresearch.org/" target="_blank" class="stat-source">Source: Pew Research Center</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="bg-light" viewBox="0 0 1000 100" fill="<?php echo $color_primary; ?>"><path d="M0 100V0h1000v4L0 100z"></path></svg> -->

        <svg xmlns="http://www.w3.org/2000/svg" class="bg-primary" viewBox="0 0 1000 100" fill="<?php echo $color_light; ?>"><path d="M0 100V0h1000v4L0 100z"></path></svg>


        <?php get_template_part('template-parts/blocks/section-heading', null, [
            'attributes' => [
                'eyebrow' => 'Getting Started',
                'heading' => 'My Process',
                'largeHeading' => false
            ]
        ]); ?>

        <?php get_template_part('template-parts/blocks/process-steps', null, [
            'attributes' => [
                'items' => [
                    [
                        'number' => '1',
                        'title' => 'Consultation',
                        'description' => 'Start by learning about your practice, discuss your goals, and outline a clear plan tailored to your needs.'
                    ],
                    [
                        'number' => '2',
                        'title' => 'Design & Development',
                        'description' => 'I\'ll create a clean, professional, and mobile-friendly website that reflects your brand, with a chance for you to review and provide feedback.'
                    ],
                    [
                        'number' => '3',
                        'title' => 'Launch & Support',
                            'description' => 'I\'ll ensure your site is fully optimized, secure, & ready to bring in clients. Ongoing support is available if needed.'
                    ]   
                ]
            ]
        ]); ?>

        <?php get_template_part('template-parts/blocks/cta-inline', null, [
            'attributes' => [
                'headline' => 'Ready to get started?',
                'content' => 'Contact me today to discuss your project and get a free consultation.',
                'button_text' => 'Get Started',
                'link' => '#contact-packages'
            ]
        ]); ?>

        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="bg-light" viewBox="0 0 1000 100" fill="<?php  //echo $color_primary; ?>"><path d="M0 100V0h1000v4L0 100z"></path></svg> -->

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="<?php echo $color_primary; ?>"><path d="M0 100V0h1000v4L0 100z"></path></svg>

        <section class="examples-section">
            <div class="container pt-5 pb-5">

                <p class="font-heading txt-secondary mb-0 text-center">Portfolio</p>
                <h2 class="text-center mb-4 hdln-2 txt-dark">See What's Possible</h2>

                <div class="row">
                    <div class="col-md-4">
                        <div class="portfolio-card-one mt-5">
                            <?php $screenshot_one = wp_get_attachment_url(getMeta('portfolio_item_one')); ?>
                            <?php get_template_part('template-parts/industry/browser', null, ['screenshot' => $screenshot_one, 'scroll_on' => true]); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portfolio-card-two mt-5">
                            <?php $screenshot_two = wp_get_attachment_url(getMeta('portfolio_item_two')); ?>
                            <?php get_template_part('template-parts/industry/browser', null, ['screenshot' => $screenshot_two, 'scroll_on' => true, 'site_url' => 'https://www.the-mind-coach.com']); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="portfolio-card-three mt-5">
                            <?php $screenshot_three = wp_get_attachment_url(getMeta('portfolio_item_three')); ?>
                            <?php get_template_part('template-parts/industry/browser', null, ['screenshot' => $screenshot_three, 'scroll_on' => true]); ?>
                        </div>
                    </div>

                </div>

            </div>
        </section>

      <svg xmlns="http://www.w3.org/2000/svg" style="background: <?php echo $color_light; ?>;" viewBox="0 0 1000 100" fill="#ffffff"><path d="M0 100V0h1000v4L0 100z"></path></svg>

      <?php get_template_part('template-parts/blocks/faqs', null, []); ?>

      <svg xmlns="http://www.w3.org/2000/svg" style="background: <?php echo $color_primary; ?>;" viewBox="0 0 1000 100" fill="<?php echo $color_light; ?>"><path d="M0 100V0h1000v4L0 100z"></path></svg>

      <?php get_template_part('template-parts/blocks/contact-form', null, [
        'attributes' => [
            'section_id' => 'form-section',
            'form_id' => 'landing-page-form'
        ]
      ]); ?>

    </div>

<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<script>

    
    
</script>

<?php get_footer(); ?>
