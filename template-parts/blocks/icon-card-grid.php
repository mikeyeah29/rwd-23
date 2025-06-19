<?php

    $attrs = $args['attributes'] ?? [];
    $cards = $attrs['cards'] ?? [];
    $background = $attrs['backgroundColor'] ?? 'white';
    $text = $attrs['textColor'] ?? 'black';

?>

<div class="icon-card-grid-block has-<?php echo esc_attr($background); ?>-background-color has-<?php echo esc_attr($text); ?>-color">
    <div class="container">
        <div class="row mt-4">
            <?php foreach ($cards as $card): ?>
                <div class="col-md-4">
                    <div class="card text-center" data-aos="fade-up">
                        <div class="card-body">
                            <?php if (!empty($card['image'])): ?>
                                <img src="<?php echo esc_url($card['image']); ?>" alt="Icon for <?php echo esc_html($card['title']); ?>" />
                            <?php endif; ?>
                            <?php if (!empty($card['title'])): ?>
                                <h3 class="card-title font-small-heading txt-medium"><?php echo $card['title']; ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($card['text'])): ?>
                                <p class="card-text"><?php echo esc_html($card['text']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
