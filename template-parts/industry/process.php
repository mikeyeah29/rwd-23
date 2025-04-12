<?php

$subheading = ( isset($args['subheading']) ? $args['subheading'] : '' );
$heading = ( isset($args['heading']) ? $args['heading'] : '' );

$items = ( isset($args['items']) ? $args['items'] : [] );  


?>

<div class="industry-process text-center bg-primary">
    <div class="container">

        <p class="font-heading txt-secondary mb-0 text-center"><?php echo $subheading; ?></p>
        <h2 class="text-center mb-4 hdln-2 txt-dark"><?php echo $heading; ?></h2>

        <div class="row mt-4">      

            <?php foreach ($items as $item) : ?>
                <div class="col-md-4">
                    <div class="card" data-aos="fade-up">
                        <div class="card-body">
                            <?php if (isset($item['number'])) : ?>
                                <div class="font-brand bg-secondary number"><?php echo $item['number']; ?></div>
                            <?php endif; ?>
                            <h5 class="card-title font-heading"><?php echo $item['title']; ?></h5>
                            <p class="card-text"><?php echo $item['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <p class="industry-process-cta-p">Ready to Get Started?</p>
        <div class="rwd-btn book-a-call cursor-pointer">Book a FREE Call</div>

    </div>
</div>
