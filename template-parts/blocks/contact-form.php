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

?>

<div class="contact-form bg-primary <?php echo $padding_classes; ?> <?php echo $color_classes; ?>" id="<?php echo $section_id; ?>">
    <div class="container">

            <form action="" method="POST" id="<?php echo $form_id; ?>">

                <input type="hidden" name="rwd_landing_page" value="yes" />

                <p class="font-small-heading txt-accent mb-0 text-center"><?php echo $eyebrow; ?></p>
                <h2 class="text-center mb-4 hdln-2 txt-dark"><?php echo $heading; ?></h2>

                <p class="text-center mb-5"><?php echo $content; ?></p>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-field">
                            <label>Name*</label>
                            <input class="form-input input-required" type="text" name="q_name" id="name" placeholder="Name..." />
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-field">
                            <label>Email*</label>
                            <input class="form-input input-required" type="email" name="q_email" id="email" placeholder="Email..." />
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-field">
                            <label>Current Website ( if you have one )</label>
                            <input class="form-input" type="text" name="q_current_site" id="current_site" placeholder="https://..." />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-field">
                            <label>Phone Number</label>
                            <input class="form-input" type="email" name="q_phone" id="phone" placeholder="Phone..." />
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-field">
                            <label>A bit about what you need help with</label>
                            <textarea class="form-input input-required" type="text" name="q_msg" id="reason" placeholder="Message..."></textarea>
                            <span class="error"></span>
                        </div>
                        <div class="form-field text-center">
                            <!-- <button class="rwd-form-btn" id="btn-contact">Submit</button> -->
                            <button class="g-recaptcha rwd-btn"
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

            <!-- Replace the variables below. -->
            <script>

              function onSubmit(token) {
                  // Get all the input elements in the form
                  var inputs = document.querySelectorAll("#<?php echo $form_id; ?> .input-required");
                  var valid = true;

                  // Loop through all the input elements
                  for (var i = 0; i < inputs.length; i++) {
                      // Check if the input is empty
                      if (!inputs[i].value) {
                          // And show an error message
                          jQuery(inputs[i]).addClass('invalid');
                          inputs[i].nextElementSibling.innerHTML = "This field is required";
                          valid = false;
                      } else {
                          // If the input is not empty, remove the error message
                          jQuery(inputs[i]).removeClass('invalid');
                          inputs[i].nextElementSibling.innerHTML = "";
                      }
                  }

                  if(valid) {
                      document.getElementById("<?php echo $form_id; ?>").submit();
                  }
              }

              jQuery(document).ready(function($) {

                    $('.book-a-call').on('click', function() {
                        document.getElementById('<?php echo $section_id; ?>').scrollIntoView({ behavior: 'smooth' });
                    });

              });

              document.querySelector('.industry-cta').addEventListener('click', function() {
                  document.getElementById('<?php echo $section_id; ?>').scrollIntoView({ behavior: 'smooth' });
              });

            </script>

          </div>
      </div>