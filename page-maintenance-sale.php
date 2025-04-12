<?php
/* Template Name: Sales Maintenance */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php

        get_template_part('template-parts/hero', null, [
            'splash' => false,
            'cta-btn' => 'Pricing',
            'cta-link' => '#pricing_table'
        ]);

     ?>

<div class="bg-rwd-section" id="header-invert-point">

    <?php

        get_template_part('template-parts/promo', 'two', [
            'position' => 'left',
            'scrollToID' => '#pricing_table',
            'btn_color' => 'main',
            'img' => 'happy.png',
            'headline' => 'Your Website Should Just Work',
            'content' => 'When you\'re running a business you don\'t want to worry about security, down time, updates or any tedious technical nonsense. Leave it to me & rest easy knowing your website is in safe hands.'
        ]);

        get_template_part('template-parts/promo', 'two', [
            'position' => 'right',
            'scrollToID' => '#pricing_table',
            'bg_color' => 'yellow',
            'img' => 'code2.webp',
            'headline' => 'Everything Taken Care Of',
            'content' => 'From domain registration and server setup to daily backups, security updates, and ongoing maintenance, I’ve got you covered. Your website will run smoothly and securely, so you can spend your time doing what you do best.'
        ]);

        include('classes/RwdManagementServices.php');
        $services = new RwdManagementServices();

    ?>

    <div class="pricing bg-pattern-grey" id="pricing_table">
        <div class="container">
            <h2 class="text-center my-3 heading-lg">Pricing</h2>

            <div class="package-table">

                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th class="package-table-heading">Basic £30 <div>per month</div></th>
                            <th class="package-table-heading-selected">Standard £60 <div>per month</div></th>
                            <th class="package-table-heading">Premium £120 <div>per month</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($services->getTable() as $key => $item) { ?>
                            <tr>
                                <td class="package-table-service-cell d-flex align-items-center">
                                    <?php echo $key; ?>
                                    <?php if($item['help']) { ?>
                                        <i class="icon-help" data-popup="<?php echo $key; ?>"></i>
                                    <?php } ?>
                                </td>
                                <td class="package-table-cell"><?php $services->outputCell($item['lite']); ?></td>
                                <td class="package-table-cell package-table-cell-selected"><?php $services->outputCell($item['pro']); ?></td>
                                <td class="package-table-cell"><?php $services->outputCell($item['premium']); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td class="text-center"><div onclick="selectPackage('#contact-packages', 'lite')" class="package-btn">Select <span class="font-brand">BASIC</span></div></td>
                            <td class="text-center"><div onclick="selectPackage('#contact-packages', 'pro')" class="package-btn is-selected">Select <span class="font-brand">STANDARD</span></div></td>
                            <td class="text-center"><div onclick="selectPackage('#contact-packages', 'premium')" class="package-btn">Select <span class="font-brand">PREMIUM</span></div></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

</div>

<?php get_template_part('template-parts/tooltips/tt', '2', ['id' => '2']); ?>
<?php get_template_part('template-parts/tooltips/tt', '3', ['id' => '3']); ?>
<?php get_template_part('template-parts/tooltips/tt', '4', ['id' => '4']); ?>
<?php get_template_part('template-parts/tooltips/tt', '5', ['id' => '5']); ?>
<?php get_template_part('template-parts/tooltips/tt', '7', ['id' => '7']); ?>
<?php get_template_part('template-parts/tooltips/tt', '8', ['id' => '8']); ?>
<?php get_template_part('template-parts/tooltips/tt', '9', ['id' => '9']); ?>
<?php // get_template_part('template-parts/tooltips/tt', '10', ['id' => '10']); ?>
<?php get_template_part('template-parts/tooltips/tt', '11', ['id' => '11']); ?>

<?php get_template_part('template-parts/contact', 'management'); ?>

<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
