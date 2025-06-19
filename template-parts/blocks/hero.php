<?php

    $attr = (isset($args['attributes']) ? $args['attributes'] : false );
    $content = (isset($attr['content']) ? $attr['content'] : '' );

    $preTitle = (isset($attr['preTitle']) ? $attr['preTitle'] : '' );
    $headline = (isset($attr['headline']) ? $attr['headline'] : '' );

    $ctaBtn = (isset($attr['ctaBtn']) ? $attr['ctaBtn'] : false );
    $ctaLink = (isset($attr['ctaLink']) ? $attr['ctaLink'] : false );


    $background_color = (isset($attr['backgroundColor']) ? $attr['backgroundColor'] : null );
    $background_color_class = ( $background_color !== null ) ? 'has-' . $background_color . '-background-color' : '';

    $slant_color = (isset($attr['slantColor']) ? $attr['slantColor'] : null );

    $background_image = (isset($attr['backgroundImage']) ? $attr['backgroundImage'] : null );
    $background_image_mobile = (isset($attr['backgroundImageMobile']) ? $attr['backgroundImageMobile'] : null );

    $style = '';

    if(wp_is_mobile()) {
        $background_image = $background_image_mobile;
    }

    if ( $background_image !== null ) {
        $style = 'style="background-image: url(' . $background_image . ');"';
    }

?>

<?php 

    if(!$background_image) {
        get_template_part('template-parts/bg', 'wavey');
    }

?>

<div class="top-padding rwd-hero <?php echo $background_color_class; ?>" <?php echo $style; ?>>

    <!-- Preload boost: hidden img for LCP priority -->
    <?php if ($background_image): ?>
        <img src="<?php echo esc_url($background_image); ?>"
                alt="Background Image for <?php echo strip_tags($headline); ?>"
                loading="eager"
                decoding="async"
                fetchpriority="high"
                style="width:0;height:0;position:absolute;visibility:hidden;">
    <?php endif; ?>

    <div class="container">

        <div class="hero-2">

            <div class="row">

                <div class="col-sm-12 text-center">

                    <div>

                        <?php if($preTitle) { ?>
                            <p><?php echo $preTitle; ?></p>
                        <?php } ?>
                            <h1><?php echo $headline; ?></h1>
                        <?php if($content) { ?>
                            <p><?php echo $content; ?></p>
                        <?php } ?>
                        <?php

                            if($ctaBtn) {
                                if (strpos($ctaLink, '#') === 0) {
                                    // $ctaBtn starts with '#'
                                    echo '<div onclick="smoothScrollTo(\'' . $ctaLink . '\')" class="rwd-btn mt-2">' . $ctaBtn . '</div>';
                                } else {
                                    // $ctaBtn does not start with '#'
                                    echo '<a href="' . $ctaLink . '" class="rwd-btn mt-2">' . $ctaBtn . '</a>';
                                }
                            }

                        ?>

                    </div>

                </div>
            </div>

        </div>

    </div>

    <?php 
    
        get_template_part('template-parts/blocks/svg-divider', null, [
            'attributes' => [
                'bottomColor' => $slant_color
            ]
        ]); 
    
    ?>
	
</div>
