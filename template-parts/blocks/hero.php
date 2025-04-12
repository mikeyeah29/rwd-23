<?php

    $args = (isset($args['attributes']) ? $args['attributes'] : false );

    $preTitle = (isset($args['preTitle']) ? $args['preTitle'] : '' );
    $headline = (isset($args['headline']) ? $args['headline'] : '' );

    $ctaBtn = (isset($args['ctaBtn']) ? $args['ctaBtn'] : false );
    $ctaLink = (isset($args['ctaLink']) ? $args['ctaLink'] : false );

    $headline = (isset($args['headline']) ? $args['headline'] : '' );

    $content = (isset($args['content']) ? $args['content'] : '' );

    $background_color = (isset($args['backgroundColor']) ? $args['backgroundColor'] : null );
    $background_color_class = ( $background_color !== null ) ? 'has-' . $background_color . '-background-color' : '';

    $slant_color = (isset($args['slantColor']) ? $args['slantColor'] : null );

?>

<?php get_template_part('template-parts/bg', 'wavey'); ?>

<div class="top-padding rwd-hero <?php echo $background_color_class; ?>">

    <div class="container">

        <div class="hero-2">

            <div class="row">

                <div class="col-sm-12 text-center">

                    <div data-aos="fade-up" data-aos-duration="1000">

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
