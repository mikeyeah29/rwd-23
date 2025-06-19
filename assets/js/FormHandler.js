
(function ($) {

    class FormHandler {

        constructor(formSelector, options = {}) {

            this.$form = $(formSelector);
            this.validator = new FormValidator(formSelector);
            this.options = options;

            this.loader = new ButtonLoader(this.$form.find(".rwd-btn--submit"), {
                loadingText: 'Sending...',
                doneText: 'Done'
            });

            if (this.$form.length) {
                this.init();
            } else {
                console.warn(`FormHandler: no form found for ${formSelector}`);
            }
        }

        init() {
            this.$form.on("submit", (e) => {
                e.preventDefault();

                if (this.validator.validate()) {
                    // this.sendForm();
                    this.sendFormFake();
                }
            });
        }

        attemptSubmit() {
            if (this.validator.validate()) {
                this.sendForm();
                // this.sendFormFake();
            }
        }

        getErrorMessage(response) {

            console.log(response);
            if (response.data && response.success === false) {
                return (response.data.message || 'An error occurred');
            }
            if (response.responseJSON) {
                return (response.responseJSON.data.message || 'An error occurred');
            }
            return 'An error occurred';
        }

        sendForm() {

            const formData = new FormData(this.$form[0]);
            const action = this.$form.attr("action") || "/wp-admin/admin-ajax.php";

            for (const [key, value] of formData.entries()) {
                console.log(key, value);
            }

            this.loader.start();

            $.ajax({
                url: action,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: (response) => {

                    console.log('IN SUCCESS: ', response);

                    if (response.success) {
                        if (typeof this.options.onSuccess === "function") {
                            this.options.onSuccess(response, this.$form);
                        } else {
                            this.defaultSuccess();
                        }
                        this.loader.success();
                    } else {

                        var errorMessage = this.getErrorMessage(response);

                        console.log('errorMessage: ', errorMessage);

                        if (typeof this.options.onError === "function") {
                            this.options.onError({ message: errorMessage }, this.$form);
                        } else {
                            this.defaultError({ message: errorMessage });
                        }
                        this.loader.fail();
                    }
                },
                error: (err) => {

                    var errorMessage = this.getErrorMessage(err);

                    console.log('errorMessage: ', errorMessage);
                    if (typeof this.options.onError === "function") {
                        this.options.onError({ message: errorMessage }, this.$form);
                    } else {
                        this.defaultError({ message: errorMessage });
                    }

                    this.loader.fail();
                }
            });
        }

        sendFormFake() {
            const formData = new FormData(this.$form[0]);
            const action = this.$form.attr("action") || "/wp-admin/admin-ajax.php";

            // for (const [key, value] of formData.entries()) {
            //     console.log(key, value);
            // }

            this.loader.start();

            // Simulate AJAX delay
            setTimeout(() => {
                const success = Math.random() > 0.3; // 70% chance of success

                if (success) {
                    const response = { success: true, message: "Fake submission succeeded." };
                    if (typeof this.options.onSuccess === "function") {
                        this.options.onSuccess(response, this.$form);
                    } else {
                        this.defaultSuccess?.();
                    }

                    this.loader.success();
                } else {
                    const response = { success: false, message: "Fake error occurred." };
                    const errorMessage = this.getErrorMessage?.(response) || response.message;

                    if (typeof this.options.onError === "function") {
                        this.options.onError({ message: errorMessage }, this.$form);
                    } else {
                        this.defaultError?.({ message: errorMessage });
                    }

                    this.loader.fail();
                }
            }, 2000); // Simulate a 2s delay
        }

        defaultSuccess() {
            this.$form.addClass("is-success");
            this.$form.find("button").text("Success! 🎉");
        }

        defaultError() {
            this.$form.addClass("has-error");
            this.$form.find("button").text("Try Again");
        }
    }

    window.FormHandler = FormHandler;

})(jQuery);
