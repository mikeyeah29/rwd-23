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

$theme = (isset($attributes['theme']) ? $attributes['theme'] : 'main');

$themes = [
    'main' => 'font-alternate txt-blue-ribbon',
    'alt' => 'font-heading txt-secondary'
];

$theme_class = $themes[$theme];

?>


<div class="industry-selling-point">
  <div class="container">

      <div class="row d-flex align-items-center justify-content-center">

          <?php if($inverted) { ?>

              <div class="col-md-4 order-2 order-md-1" data-aos="fade-left">
                  <img src="<?php echo $image; ?>" alt="<?php echo 'Image for ' . $subheading; ?>" />
              </div>

              <div class="col-md-6 order-1 order-md-2" data-aos="fade-up">

                  <p class="<?php echo $theme_class; ?> mb-0"><?php echo $subheading; ?></p>
                  <h2 class="txt-dark"><?php echo $heading; ?></h2>
                  <p><?php echo $content; ?></p>

              </div>

          <?php }else{ ?>

            <div class="col-md-6 order-2 order-md-1" data-aos="fade-up">
                <p class="<?php echo $theme_class; ?> mb-0"><?php echo $subheading; ?></p>
                <h2 class="txt-dark"><?php echo $heading; ?></h2>
                <p><?php echo $content; ?></p>
            </div>
            <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                <img src="<?php echo $image; ?>" alt="<?php echo 'Image for ' . $subheading; ?>" />
            </div>

          <?php } ?>

      </div>

  </div>
</div>
