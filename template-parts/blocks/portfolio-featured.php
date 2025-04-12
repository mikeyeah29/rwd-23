<?php

    $attrs = $args['attributes'] ?? [];

    $posts_per_page = $attrs['postsPerPage'] ?? -1;
    $order = $attrs['order'] ?? 'DESC';
    $post__in = array_filter(array_map('absint', explode(',', $attrs['postIn'] ?? '')));

    $query_args = [
        'post_type' => 'portfolio-item',
        'posts_per_page' => $posts_per_page,
        'orderby' => !empty($post__in) ? 'post__in' : 'date',
        'order' => $order,
    ];

    if (!empty($post__in)) {
        $query_args['post__in'] = $post__in;
    }

    $query = new WP_Query($query_args);

?>

<div class="position-relative pb-small bg-white">
    <div class="container">
        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php include get_template_directory() . '/template-parts/portfolio-item-big.php'; ?>
            <?php endwhile; wp_reset_postdata(); ?>
        <?php else: ?>
            <p><?php esc_html_e('No portfolio items found.', 'textdomain'); ?></p>
        <?php endif; ?>
    </div>
</div>
