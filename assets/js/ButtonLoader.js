(function ($) {

    class ButtonLoader {
        constructor($button, options = {}) {
            this.$button = $button;
            this.originalText = $button.text();

            this.options = {
                loadingText: 'Sending...',
                doneText: 'Sent',
                ...options
            };
        }

        start() {

            console.log('THIS IS THE BUTTON', this.$button);

            this.$button.removeClass('is-success');
            this.$button.removeClass('has-error');
            this.$button.addClass('is-loading');
            this.$button.prop('disabled', true);
            this.$button.text(this.options.loadingText);
        }

        success() {
            this.$button.text(this.options.doneText);
            this.$button.removeClass('is-loading');
            this.$button.prop('disabled', false);
            this.$button.addClass('is-success');
            this.$button.removeClass('has-error');
        }

        fail() {
            this.$button.text(this.originalText);
            this.$button.removeClass('is-loading');
            this.$button.prop('disabled', false);
            this.$button.removeClass('is-success');
            this.$button.addClass('has-error');
        }

        reset() {
            this.fail();
        }
    }

    window.ButtonLoader = ButtonLoader;

})(jQuery);