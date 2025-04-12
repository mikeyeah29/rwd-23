<?php
// Ensure $args is set and defaults are applied
$percentage = isset($args['percentage']) ? max(0, min(100, $args['percentage'])) : 50;
$color = isset($args['color']) ? $args['color'] : '#ff6347';
$background_color = isset($args['background_color']) ? $args['background_color'] : '#ddd';

// Convert percentage to degrees for the conic-gradient
$degree = ($percentage / 100) * 360; // Convert percentage to degrees
?>
<div class="pie-chart-container">
    <div class="pie-chart" style="background: conic-gradient(<?php echo $background_color; ?> 0deg <?php echo (360 - $degree); ?>deg, <?php echo $color; ?> <?php echo (360 - $degree); ?>deg 360deg);">
        <div class="pie-label"><?php echo $percentage; ?>%</div>
    </div>
</div>