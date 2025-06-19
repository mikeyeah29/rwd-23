<?php

$attrs = $args['attributes'];
$content = $args['content'];

$style = (isset($attrs['style']) ? $attrs['style'] : []);
$padding_classes = RWD_GutenbergHelpers::get_padding_classes($style);

$color_classes = RWD_GutenbergHelpers::get_color_classes($attrs);
$text_color = RWD_GutenbergHelpers::get_text_color_class($attrs) ?? 'txt-dark';

?>

<div class="industry-process text-center <?php echo $padding_classes; ?> <?php echo $color_classes; ?>">
    <div class="container">

        <div class="row">      

            <?php echo $content; ?>

        </div>

    </div>
</div>
