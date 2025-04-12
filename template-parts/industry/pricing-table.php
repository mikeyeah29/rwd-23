<?php

$heading = $args['heading'];
$price = $args['pricing'];
$package = $args['package'];
$ideal_for = $args['ideal_for'];

?>

<div class="card mb-4 shadow-sm">
    <div class="card-header bg-dark">
        <h4 class="my-0 font-weight-normal text-center"><?php echo $heading; ?></h4>
    </div>
    <div class="card-body">
        <h5 class="card-title pricing-card-title txt-secondary text-center"><?php echo $price; ?></h5>
        <div class="ideal-for">
          <p><b>Ideal For</b> <?php echo $ideal_for; ?></p>
        </div>
        </p>
        <ul class="list-unstyled mt-3 mb-4">
            <?php foreach ($package as $item) { ?>
                <li>
                    <?php if($item === '-') { ?>

                        <svg fill="<?php echo RwdColors::getAccent(); ?>" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path d="M5.48 10.089l1.583-1.464c1.854.896 3.028 1.578 5.11 3.063 3.916-4.442 6.503-6.696 11.311-9.688l.516 1.186c-3.965 3.46-6.87 7.314-11.051 14.814-2.579-3.038-4.301-4.974-7.469-7.911zm14.407.557c.067.443.113.893.113 1.354 0 4.962-4.038 9-9 9s-9-4.038-9-9 4.038-9 9-9c1.971 0 3.79.644 5.274 1.723.521-.446 1.052-.881 1.6-1.303-1.884-1.511-4.271-2.42-6.874-2.42-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.179-.19-2.313-.534-3.378-.528.633-1.052 1.305-1.579 2.024z"/></svg>
                        <span class="ml-2"></span>

                    <?php }else{ ?>

                        <svg fill="<?php echo RwdColors::getSuccess(); ?>" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path d="M5.48 10.089l1.583-1.464c1.854.896 3.028 1.578 5.11 3.063 3.916-4.442 6.503-6.696 11.311-9.688l.516 1.186c-3.965 3.46-6.87 7.314-11.051 14.814-2.579-3.038-4.301-4.974-7.469-7.911zm14.407.557c.067.443.113.893.113 1.354 0 4.962-4.038 9-9 9s-9-4.038-9-9 4.038-9 9-9c1.971 0 3.79.644 5.274 1.723.521-.446 1.052-.881 1.6-1.303-1.884-1.511-4.271-2.42-6.874-2.42-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11c0-1.179-.19-2.313-.534-3.378-.528.633-1.052 1.305-1.579 2.024z"/></svg>
                        <span class="ml-2"><?php echo $item; ?></span>

                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
