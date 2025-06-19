<?php

namespace RWD\AjaxForms;

abstract class BaseFormHandler {

    protected $cleaned_data = [];

    protected function validate_data($nonce_name, $required_fields = [], $check_bot = true) {

        $security_check = \CodeMailer\FormUtils::security_check($nonce_name);

        if ($security_check !== true) {
            wp_send_json_error(['message' => $security_check['message']], $security_check['status']);
        }

        $require_fields = \CodeMailer\FormUtils::require_fields($required_fields);

        if ($require_fields !== true) {
            wp_send_json_error(['message' => $require_fields], 422);
        }

        if ($check_bot) {
            $bot_protector = new \CodeMailer\AntiBotProtector();
            if (!$bot_protector->validate_submission($_POST)) {
                wp_send_json_error(['message' => 'Bot detected or invalid form submission.'], 422);
            }
        }
    }

    protected function sanitize_data($post_data) {
        return \CodeMailer\FormUtils::sanitize_data($post_data);
    }

    abstract public function handle();
}

?>