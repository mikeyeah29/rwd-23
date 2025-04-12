<?php

$attributes = $args['attributes'];

// dd($attributes);

$subheading = (isset($attributes['subheading']) ? $attributes['subheading'] : '');
$heading = (isset($attributes['heading']) ? $attributes['heading'] : '');
$content = (isset($attributes['content']) ? $attributes['content'] : '');

$image = $attributes['image'];
$inverted = ( isset($attributes['inverted']) ? $attributes['inverted'] : false );

// $background = ( isset($attributes['background']) ? $attributes['background'] : '#fff9fa' );

$style = (isset($attributes['style']) ? $attributes['style'] : []);
$padding_classes = RWD_GutenbergHelpers::get_padding_classes($style);
$color_classes = RWD_GutenbergHelpers::get_color_classes($attributes);

?>

<div class="<?php echo $padding_classes; ?> <?php echo $color_classes; ?>">

    <div class="selling-point-bold-block position-relative">
        <div class="container">

            <div class="row d-flex align-items-left justify-content-left">

                <?php if($inverted) { ?>

                    <img src="<?php echo $image; ?>" class="position-absolute top-0 left-0" data-aos="fade-right" data-aos-duration="800" />

                    <div class="col-md-6 offset-md-6 order-1 order-md-2" data-aos="fade-up" data-aos-duration="800">

                        <?php if(!empty($subheading)) : ?>
                            <p class="font-small-heading txt-accent mb-0 text-end"><?php echo $subheading; ?></p>
                        <?php endif; ?>
                        <?php if(!empty($heading)) : ?>
                            <h2 class="txt-dark text-end"><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if(!empty($content)) : ?>
                            <p class="text-end"><?php echo $content; ?></p>
                        <?php endif; ?>

                    </div>

                <?php }else{ ?>

                    <div class="col-md-6 order-2 order-md-1" data-aos="fade-up" data-aos-duration="800">
                        <?php if(!empty($subheading)) : ?>
                            <p class="font-small-heading txt-accent mb-0"><?php echo $subheading; ?></p>
                        <?php endif; ?>
                        <?php if(!empty($heading)) : ?>
                            <h2 class="txt-dark"><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if(!empty($content)) : ?>
                            <p><?php echo $content; ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <img src="<?php echo $image; ?>" class="position-absolute right-0" data-aos="fade-left" data-aos-duration="800" />

                <?php } ?>

            </div>

        </div>
    </div>

</div>