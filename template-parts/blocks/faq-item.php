
<?php

$attrs = $args['attributes'];

$faq = [
    'question' => $attrs['question'],
    'answer' => $attrs['answer']
];

?>

<div class="faq-item">
    <div class="faq-question">
        <?php echo wp_kses_post($faq['question']); ?>
        <span class="faq-arrow">&#9660;</span>
    </div>
    <div class="faq-answer">
        <p><?php echo wp_kses_post($faq['answer']); ?></p>
    </div>
</div>