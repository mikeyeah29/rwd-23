<?php

class RwdMail
{
    static private function rateLimitReached()
    {
        // Rate limiting
        $ip = $_SERVER['REMOTE_ADDR'];
        $rateLimitKey = 'rate_limit_' . $ip;
        $rateLimitCount = get_transient($rateLimitKey);

        if ($rateLimitCount && $rateLimitCount > 10) {
            return false;
        }

        // Increase rate limit count
        if (!$rateLimitCount) {
            set_transient($rateLimitKey, 1, HOUR_IN_SECONDS);
        } else {
            set_transient($rateLimitKey, $rateLimitCount + 1, HOUR_IN_SECONDS);
        }

        return true;
    }

    static public function send($to, $templateName, $vars)
    {
        $gResponse = (isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null);

        if($gResponse) {
            // using captcha
            if(!RwdGoogleCaptchaV3::validate($gResponse)) {
                return "Google captcha invalid";
            }
        }

        if(!self::rateLimitReached()) {
            return "You have reached the maximum number of emails you can send. Please try again later.";
        }

        $htmlTemplate = file_get_contents(get_template_directory() . '/emails/' . $templateName . '.html');

        foreach ($vars as $key => $value) {
            $htmlTemplate = str_replace('{{' . $key . '}}', $value, $htmlTemplate);
        }

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=UTF-8';

        if (wp_mail([$to, 'mikerockett@live.com'], 'RWD contact form', $htmlTemplate, $headers)) {
            return "Thanks for your enquiry, I'll get back to you shortly";
        } else {
            return "Something went wrong, please try again later";
        }
    }
}

?>
