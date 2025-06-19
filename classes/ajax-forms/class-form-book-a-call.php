<?php

namespace RWD\AjaxForms;

class BookACallFormHandler extends BaseFormHandler {

    var $action = 'book_a_call_form';
    protected $cleaned_data = [];

    public function __construct() {
        add_action('admin_post_nopriv_' . $this->action, [$this, 'handle']);
        add_action('admin_post_' . $this->action, [$this, 'handle']);
        $this->cleaned_data = \CodeMailer\FormUtils::sanitize_data($_POST);
    }

    private function get_display_data() {
        return [
            ['name' => 'Name', 'value' => $this->cleaned_data['q_name']],
            ['name' => 'Email', 'value' => $this->cleaned_data['q_email']],
            ['name' => 'Website', 'value' => $this->cleaned_data['q_current_site']],
            ['name' => 'Phone', 'value' => $this->cleaned_data['q_phone']],
            ['name' => 'Message', 'value' => $this->cleaned_data['q_msg']]
        ];
    }

    private function get_admin_email() {
        return ['mikerockett@live.com', 'mike@rockettwd.co.uk'];
    }

    private function get_user_email() {
        return $this->cleaned_data['q_email'];
    }

    public function handle() {

        $this->validate_data($this->action . '_nonce', ['q_email']);

        $mailer = new \CodeMailer\Mailer();
        $data = $this->get_display_data();        

        // Send admin notification
        $admin_sent = $mailer->send([
            'to'      => $this->get_admin_email(),
            'subject' => 'Message from RWD Website ( Book a Call )',
            'data' => $data,
            'log' => true
        ], 'book-a-call-admin');

        // Send user confirmation
        $user_sent = $mailer->send([
            'to'      => $this->get_user_email(),
            'subject' => 'Thanks for your message',
            'data' => $data,
            'log' => true
        ], 'book-a-call');

        if(!$user_sent) {
            wp_send_json_error(['message' => 'Something went wrong. Please check your email address.']);
        }

        if ($admin_sent && $user_sent) {
            wp_send_json_success(['message' => 'Thanks! We’ve received your message.']);
        } else {
            wp_send_json_error(['message' => 'Something went wrong. Please try again.']);
        }

    }
}
