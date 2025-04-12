<h3>Related Posts</h3>
<ul class="posts-list">
    <?php
    $related_posts = get_related_posts(get_the_ID(), 3);
    foreach ( $related_posts as $post ) {
        ?>
        <li>
            <a href="<?php echo get_permalink( $post->ID ); ?>">
                <div>
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" />
                    <p class="font-brand posts-list-title"><?php echo $post->post_title; ?></p>
                </div>
            </a>
        </li>
        <?php
    }
    ?>
</ul>
