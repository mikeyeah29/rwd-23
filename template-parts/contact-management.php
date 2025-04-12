<div class="pricing bg-pattern-light-blue py-6" id="contact-packages">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <form action="" method="POST" class="footer-contact-form" id="form_managment">

                    <input type="hidden" name="rwd_contact_management" value="yes" />

                    <h3>Contact Me</h3>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-field">
                                <input class="form-input input-required" type="text" name="q_name" id="name" placeholder="Name..." />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-field">
                                <input class="form-input input-required" type="email" name="q_email" id="email" placeholder="Email..." />
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-field">
                                <select id="package" class="input-required input-required" name="q_package">
                                    <option value="">Select a package</option>
                                    <option value="lite">Basic</option>
                                    <option value="pro">Standard</option>
                                    <option value="premium">Premium</option>
                                    <span class="error"></span>
                                </select>
                            </div>
                            <div class="form-field">
                                <textarea class="form-input input-required" type="text" name="q_msg" id="reason" placeholder="Message..."></textarea>
                                <span class="error"></span>
                            </div>
                            <div class="form-field">
                                <!-- <button class="rwd-form-btn" id="btn-contact">Submit</button> -->
                                <button class="g-recaptcha rwd-form-btn"
                                    id="btn-contact"
                                    data-sitekey="<?php echo GOOGLE_CAPTCHA; ?>"
                                    data-callback='onSubmit'
                                    data-action='submit'>
                                  Submit
                                </button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <div class="col-sm-4">
                <ul class="footer-contact">
                    <li><a href="mailto:mike@rockettwd.co.uk">mike@rockettwd.co.uk</a><i class="fa fa-envelope" aria-hidden="true"></i></li>
                    <li><a href="tel:07736546570">+44 (0) 77365465760</a><i class="fa fa-phone"></i></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>

    function onSubmit() {

        // Get all the input elements in the form
        var inputs = document.querySelectorAll(".footer-contact-form .input-required");
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
            document.getElementById("form_managment").submit();
        }

    }

    // // Get all the input elements in the form
    // var inputs = document.querySelectorAll(".footer-contact-form .input-required");
    //
    // // Add a 'submit' event listener to the form
    // document.querySelector("form").addEventListener("submit", function(e) {
    //     // Loop through all the input elements
    //     for (var i = 0; i < inputs.length; i++) {
    //         // Check if the input is empty
    //         if (!inputs[i].value) {
    //             // If it is, prevent the form from being submitted
    //             e.preventDefault();
    //             // And show an error message
    //             jQuery(inputs[i]).addClass('invalid');
    //             inputs[i].nextElementSibling.innerHTML = "This field is required";
    //         } else {
    //             // If the input is not empty, remove the error message
    //             jQuery(inputs[i]).removeClass('invalid');
    //             inputs[i].nextElementSibling.innerHTML = "";
    //         }
    //     }
    // });

</script>
