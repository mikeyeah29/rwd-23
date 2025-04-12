<?php

    $items = array(
        'Hosting / domain management',
        'WordPress updates',
        'Plugin / Theme Updates',
        'Regular backups of site and content',
        'Security Checks',
        'SSL Handling',
        'SEO best practices coding wise',
        'Troubleshooting (when problems arise)',
        'Uptime monitoring',
        'Additional support',
        'Malware scan',
        'Website audit'
    );

    $lite = array(1, 1, 1, 1, 0, 0, 0, 0, 0, 0);
    $pro = array(1, 1, 1, 1, 0, 0, 0, 0, 0, 0);
    $ultimate = array(1, 1, 1, 1, 0, 0, 0, 0, 0, 0);

?>

<div class="row justify-content-center">
    <div class="package-section d-md-flex justify-content-center">
        <div class="features">
            <h3>Lite £60 pm</h3>
            <ul>
                <?php foreach ($items as $i => $item) { ?>
                    <li class="d-flex align-items-center">
                        <i class="<?php echo ( $lite[$i] ? 'features-tick' : 'features-cross'); ?>"></i>
                        <?php echo $item; ?>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="features features-selected">
            <h3>Pro £90 pm</h3>
            <ul>
                <?php foreach ($items as $i => $item) { ?>
                    <li class="d-flex align-items-center">
                        <i class="<?php echo ( $pro[$i] ? 'features-tick' : 'features-cross'); ?>"></i>
                        <?php echo $item; ?>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <div class="features">
            <h3>Ultimate £120 pm</h3>
            <ul>
                <?php foreach ($items as $i => $item) { ?>
                    <li class="d-flex align-items-center">
                        <i class="<?php echo ( $ultimate[$i] ? 'features-tick' : 'features-cross'); ?>"></i>
                        <?php echo $item; ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="rwd-btn">Contact Me</div>

</div>
