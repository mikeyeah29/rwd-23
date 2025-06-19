
(function ($) {

    class FormValidator {
        constructor(formSelector) {
            this.$form = $(formSelector);
            this.$fields = this.$form.find("[data-validate]");
        }

        validate() {
            let isValid = true;

            this.$fields.each((index, field) => {
                const $field = $(field);
                const type = $field.data("validate");
                const tag = $field.prop("tagName").toLowerCase();
                const fieldType = $field.attr("type");
                const name = $field.attr("name");

                $field.removeClass("invalid");
                this.removeErrorMessage($field);

                let value;
                let valid = true;

                if (fieldType === "radio" || fieldType === "checkbox") {
                    value = this.$form.find(`[name="${name}"]`).filter(":checked").length > 0;
                } else {
                    value = $.trim($field.val());
                }

                if (type === "required" && (value === "" || value === false)) {
                    valid = false;
                } else if (type === "email" && !this.validateEmail(value)) {
                    valid = false;
                } else if (type === "phone" && !this.validatePhone(value)) {
                    valid = false;
                } else if (type === "checkbox" && !$field.is(":checked")) {
                    valid = false;
                }

                if (!valid) {
                    isValid = false;
                    $field.addClass("invalid");
                    this.showErrorMessage($field);
                }
            });

            return isValid;
        }

        validateEmail(email) {
            return /\S+@\S+\.\S+/.test(email);
        }

        validatePhone(phone) {
            return /^[0-9\-\+() ]{7,15}$/.test(phone);
        }

        showErrorMessage($field) {
            const defaultMessages = {
                required: "This field is required.",
                email: "Please enter a valid email address.",
                phone: "Please enter a valid phone number.",
                checkbox: "This checkbox must be checked."
            };

            const type = $field.data("validate");
            const customMessage = $field.data("error");
            const message = customMessage || defaultMessages[type] || "Invalid field.";

            const $error = $('<span class="form-error"></span>').text(message);

            console.log('error', $error);
            console.log('field', $field);

            $field.after($error);
        }

        removeErrorMessage($field) {
            $field.siblings(".form-error").remove();
        }
    }

    window.FormValidator = FormValidator;

})(jQuery);