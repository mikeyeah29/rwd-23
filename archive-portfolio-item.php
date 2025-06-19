<?php get_header(); ?>

<?php get_template_part('template-parts/blocks/hero', null, [
    'splash' => false,
    'headline' => 'Portfolio'
]); ?>

<style>
    
    .category-filter {
        margin-bottom: 30px;
    }

    .category-filter ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .category-filter ul li {
        display: inline-block;
        margin-right: 10px;
    }

    .category-filter ul li a {
        text-decoration: none;
        color: #000;
    }

    .category-filter ul li a:hover {
        color: #000;
    }   
    
</style>

<?php

    $categories = get_terms([
        'taxonomy' => 'skill',
        'hide_empty' => false,
    ]);

?>

<div class="bg-rwd-section py-6" id="header-invert-point">
    <div class="container">



        <!-- category filter -->
        <div class="category-filter text-center">
            <ul>
                <li><a href="#">All</a></li>
                <?php foreach ($categories as $category) : ?>
                    <li><a href="" class="<?php echo ($category->slug == 'all') ? 'is-active' : ''; ?>"><?php echo $category->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>


        <!-- <div class="hero">

            <h1 id="typedtext">Blog</h1>

        </div> -->

        <div class="row">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="col-sm-12">
                    <?php // include('template-parts/portfolio-item-simple.php'); ?>
                    <?php include('template-parts/portfolio-item-big.php'); ?>
                </div>

            <?php endwhile; else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>

            <!-- <div class="col-sm-4">
                <?php // get_sidebar(); ?>
            </div> -->
        </div>

        <div class="rwd-pagination">
            <?php wp_pagination(); ?>
        </div>

    </div>

</div>

<?php

    get_template_part('template-parts/banner', 'promo', [
        'title' => 'Looking to enhance your online presence?',
        'body' => 'Get in touch today and let\'s get your ideas online.',
        'btn-text' => 'Contact Me',
        'btn-link' => home_url() . '/contact'
    ]);

?>

<?php get_footer(); ?>
