<?php 

$attributes = (isset($args['attributes']) ? $args['attributes'] : []);

$section_id = (isset($attributes['section_id']) ? $attributes['section_id'] : 'form-section');
$form_id = (isset($attributes['form_id']) ? $attributes['form_id'] : 'landing-page-form');

$eyebrow = (isset($attributes['eyebrow']) ? $attributes['eyebrow'] : 'Contact Me');
$heading = (isset($attributes['heading']) ? $attributes['heading'] : 'Book a free call');
$content = (isset($attributes['content']) ? $attributes['content'] : 'If you\'re ready to get started or just want to ask a few questions to find out if I can help you, simply fill out a few details below and I\'ll get back to you within 48 hours.');

$style = (isset($attributes['style']) ? $attributes['style'] : []);
$padding_classes = RWD_GutenbergHelpers::get_padding_classes($style);
$color_classes = RWD_GutenbergHelpers::get_color_classes($attributes);

$text_color = RWD_GutenbergHelpers::get_text_color_class($attributes) ?? 'txt-dark';

$bot_protector = new \CodeMailer\AntiBotProtector();

$extra_data = [];

$is_agency_dev_page = false;
$current_url_slug = get_post_field('post_name', get_post());

$extra_data['current_url_slug'] = $current_url_slug;

if($current_url_slug == 'agency-dev-review') {
    $is_agency_dev_page = true;
}

// LABELS

$current_website_label = 'Current Website ( if you have one )';
$message_label = 'A bit about what you need help with';

if($is_agency_dev_page) {
    $current_website_label = 'Website To Review';
    $message_label = 'Any additional information you think is relevant';
}

?>

<div class="contact-form bg-primary <?php echo $padding_classes; ?> <?php echo $color_classes; ?>" id="<?php echo $section_id; ?>">
    <div class="container">

            <p class="font-small-heading txt-blue-ribbon mb-0 text-center"><?php echo $eyebrow; ?></p>
            <h2 class="text-center mb-4 hdln-2 <?php echo $text_color; ?>"><?php echo $heading; ?></h2>

            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <p class="text-center mb-5 <?php echo $text_color; ?>"><?php echo $content; ?></p>
                </div>
            </div>

            <form action="<?php echo admin_url('admin-post.php'); ?>" method="POST" id="<?php echo $form_id; ?>">

                <?php echo $bot_protector->render_stealth_fields(); ?>

                <?php wp_nonce_field('book_a_call_form_nonce_action', 'book_a_call_form_nonce'); ?>

                <input type="hidden" name="action" value="book_a_call_form">

                <?php foreach ($extra_data as $key => $value) : ?>
                    <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
                <?php endforeach; ?>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-field">
                            <label class="<?php echo $text_color; ?>">Name*</label>
                            <input class="form-input input-required <?php echo $text_color; ?>" type="text" name="q_name" id="name" placeholder="Name..." data-validate="required" data-error="Please enter your name" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-field">
                            <label class="<?php echo $text_color; ?>">Email*</label>
                            <input class="form-input input-required <?php echo $text_color; ?>" type="email" name="q_email" id="email" placeholder="Email..." data-validate="email" data-error="Please enter a valid email" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-field">
                            <label class="<?php echo $text_color; ?>"><?php echo $current_website_label; ?></label>
                            <input class="form-input <?php echo $text_color; ?>" type="text" name="q_current_site" id="current_site" placeholder="https://..." />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-field">
                            <label class="<?php echo $text_color; ?>">Phone Number</label>
                            <input class="form-input <?php echo $text_color; ?>" type="email" name="q_phone" id="phone" placeholder="Phone..." />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-field">
                            <label class="<?php echo $text_color; ?>"><?php echo $message_label; ?></label>
                            <textarea class="form-input input-required <?php echo $text_color; ?>" type="text" name="q_msg" id="reason" placeholder="Message..." data-validate="required" data-error="Please enter a message"></textarea>
                        </div>
                        <div class="form-field text-center">
                            <!-- <button class="rwd-form-btn" id="btn-contact">Submit</button> -->
                            <button class="g-recaptcha rwd-btn rwd-btn--submit"
                                id="<?php echo $form_id; ?>-submit"
                                data-sitekey="<?php echo GOOGLE_CAPTCHA; ?>"
                                data-callback='onSubmit'
                                data-action='submit'>
                              Submit
                            </button>
                        </div>
                    </div>
                </div>

            </form>

            <div class="rwd-form-message d-none">Thank you, your message has been sent!</div>
            <div class="rwd-form-message--error d-none"></div>

            <!-- Replace the variables below. -->
            <script>

               // jQuery(document).ready(function($) {

                    function onSubmit(token) {

                        const formId = '#<?php echo esc_attr($form_id); ?>';
                        const sectionId = '#<?php echo esc_attr($section_id); ?>';
                        const formMessageElement = formId + " + .rwd-form-message";
                        const formMessageErrorElement = sectionId + " .rwd-form-message--error";
                        const formSubmitButton = formId + " .rwd-btn--submit";

                        const formHandler = new FormHandler(formId, {
                            buttonText: "Book a call",
                            onSuccess: function (response, $form) {
                                console.log("YEAHHH!", response);
                                // $form.css('visibility', 'hidden');
                                $(formSubmitButton).addClass('d-none');
                                $(formMessageElement).removeClass("d-none");
                                $(formMessageErrorElement).addClass("d-none");
                            },
                            onError: function (response, $form) {
                                console.log("NAHHH!", response.message);
                                console.log("FORM MESSAGE ERROR ELEMENT", formMessageErrorElement);
                                $(formMessageErrorElement).text(response.message);
                                $(formMessageErrorElement).removeClass("d-none");
                            }
                        });

                        formHandler.attemptSubmit();

                    }

               // });

            //   function onSubmit(token) {
            //       // Get all the input elements in the form
            //       var inputs = document.querySelectorAll("#<?php // echo $form_id; ?> .input-required");
            //       var valid = true;

            //       // Loop through all the input elements
            //       for (var i = 0; i < inputs.length; i++) {
            //           // Check if the input is empty
            //           if (!inputs[i].value) {
            //               // And show an error message
            //               jQuery(inputs[i]).addClass('invalid');
            //               inputs[i].nextElementSibling.innerHTML = "This field is required";
            //               valid = false;
            //           } else {
            //               // If the input is not empty, remove the error message
            //               jQuery(inputs[i]).removeClass('invalid');
            //               inputs[i].nextElementSibling.innerHTML = "";
            //           }
            //       }

            //       if(valid) {
            //           document.getElementById("<?php // echo $form_id; ?>").submit();
            //       }
            //   }

              jQuery(document).ready(function($) {

                    $('.book-a-call').on('click', function() {
                        document.getElementById('<?php echo $section_id; ?>').scrollIntoView({ behavior: 'smooth' });
                    });

              });

              if(document.querySelector('.industry-cta')) {
                document.querySelector('.industry-cta').addEventListener('click', function() {
                    document.getElementById('<?php echo $section_id; ?>').scrollIntoView({ behavior: 'smooth' });
                });
              }

            </script>

          </div>
      </div>