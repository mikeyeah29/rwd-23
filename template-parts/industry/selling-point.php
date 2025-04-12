<?php

$subheading = $args['subheading'];
$heading = $args['heading'];
$content = $args['content'];
// $image = $args['image']['url'];
$image = $args['image'];
$inverted = ( isset($args['inverted']) ? $args['inverted'] : false );

?>


<div class="industry-selling-point">
  <div class="container">

      <div class="row d-flex align-items-center justify-content-center">

          <?php if($inverted) { ?>

              <div class="col-md-4 order-2 order-md-1" data-aos="fade-left">
                  <img src="<?php echo $image; ?>" />
              </div>

              <div class="col-md-6 order-1 order-md-2" data-aos="fade-up">

                  <p class="font-heading txt-secondary mb-0"><?php echo $subheading; ?></p>
                  <h2 class="txt-dark"><?php echo $heading; ?></h2>
                  <p><?php echo $content; ?></p>

              </div>

          <?php }else{ ?>

            <div class="col-md-6 order-2 order-md-1" data-aos="fade-up">
                <p class="font-heading txt-secondary mb-0"><?php echo $subheading; ?></p>
                <h2 class="txt-dark"><?php echo $heading; ?></h2>
                <p><?php echo $content; ?></p>
            </div>
            <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                <img src="<?php echo $image; ?>" />
            </div>

          <?php } ?>

      </div>

  </div>
</div>
