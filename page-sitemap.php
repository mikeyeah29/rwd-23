<?php

/*
Template Name: Sitemap
*/

get_header();

?>

<div class="container">

    <h1>Sitemap</h1>

    <div class="row">
        <div class="col-md-6">
            <h2>Pages</h2>
            <ul>
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li><a href="<?php echo home_url(); ?>/services">Services</a></li>
                <li><a href="<?php echo home_url(); ?>/maintenance">Hosting &Maintenance</a></li>
                <li><a href="<?php echo home_url(); ?>/portfolio">Portfolio</a></li>
                <li><a href="<?php echo home_url(); ?>/blog">Blog</a></li>
                <li><a href="<?php echo home_url(); ?>/blog/post">Blog Post</a></li>
                <li><a href="<?php echo home_url(); ?>/about">About</a></li>
                <li><a href="<?php echo home_url(); ?>/contact">Contact</a></li>
            </ul>
        </div>
    </div>
    

</div>

<?php

get_footer();

?>