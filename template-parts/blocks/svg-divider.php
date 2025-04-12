<?php 

    $args = $args['attributes'];

    $top_color = ( isset($args['topColor']) ? $args['topColor'] : 'transparent' ); 
    $bottom_color = ( isset($args['bottomColor']) ? $args['bottomColor'] : 'white' ); 

    $fill = ( isset($args['fill']) ? $args['fill'] : '#fff' ); 
    $inverted = ( isset($args['inverted']) ? $args['inverted'] : false );
    $position = ( isset($args['position']) ? $args['position'] : 'bottom' );

    $postition_class = ( $position !== 'none' ) ? 'position-absolute' : '';

?>

<div class="svg-divider-slant <?php echo $postition_class; ?> has-<?php echo $top_color; ?>-background-color is-<?php echo $position; ?> left-0 w-100 <?php echo $inverted ? 'inverted' : ''; ?>">
    <svg data-name="Layer 1" class="has-<?php echo $bottom_color; ?>-fill-color" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
    </svg>
</div>