<?php
// Ensure $args is set and defaults are applied
$screenshot = isset($args['screenshot']) ? $args['screenshot'] : ''; // Provide a fallback if no screenshot is passed
$scroll_on = isset($args['scroll_on']) ? $args['scroll_on'] : false;
$site_url = isset($args['site_url']) ? $args['site_url'] : '';
?>
<?php if($site_url){ ?>
    <a href="<?php echo esc_url($site_url); ?>" target="_blank">
<?php } ?>
        <div class="browser">
            <div class="browser-bar">
                <div class="browser-btn"></div>
                <div class="browser-btn"></div>
                <div class="browser-btn"></div>
            </div>
            <div class="aspect-ratio">
                <?php if ($scroll_on) { ?>
                    <div class="scrolling-image">
                        <img src="<?php echo esc_url($screenshot); ?>" alt="Browser Screenshot" />
                    </div>
                <?php }else{ ?>
                        <img src="<?php echo esc_url($screenshot); ?>" alt="Browser Screenshot" />
                    <?php } ?>
            </div>
        </div>
<?php if($site_url){ ?>
    </a>
<?php } ?>