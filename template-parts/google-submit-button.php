<?php

$button_text = $button_text ?? 'Submit';
$button_id = $button_id ?? 'btn-contact';
$data_sitekey = $data_sitekey ?? GOOGLE_CAPTCHA;
$data_callback = $data_callback ?? 'onSubmit';
$data_action = $data_action ?? 'submit';

?>

<button class="g-recaptcha rwd-form-btn"
    id="<?php echo $button_id; ?>"
    data-sitekey="<?php echo $data_sitekey; ?>"
    data-callback='<?php echo $data_callback; ?>'
    data-action='<?php echo $data_action; ?>'>
    <?php echo $button_text; ?>
</button>