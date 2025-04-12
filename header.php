<!DOCTYPE html>
<html>
    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Use a Font Awesome CDN -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <!-- Adobe Fonts -->
        <link rel="stylesheet" href="https://use.typekit.net/wnr4tte.css">

        <link rel="profile" href="https://gmpg.org/xfn/11">

        <script src="https://www.google.com/recaptcha/enterprise.js?render=<?php echo GOOGLE_CAPTCHA; ?>"></script>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-X7BKR206G9"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-X7BKR206G9');
        </script>

        <title><?php wp_title('|', true, 'right'); ?></title>

        <?php wp_head(); ?>

        <?php

            $formSent = false;

            // general form
            if(isset($_POST['rwd_contact_form'])) {
                $formResMsg = RwdMail::send(RWD_ADMIN_EMAIL, 'general', [
                    'name' => sanitize_text_field($_POST['q_name']),
                    'email' => sanitize_email($_POST['q_email']),
                    'message' => sanitize_text_field($_POST['q_msg']),
                ]);
                $formSent = true;
            }

            // maintainence form
            if(isset($_POST['rwd_contact_management'])) {
                $formResMsg = RwdMail::send(RWD_ADMIN_EMAIL, 'management', [
                    'name' => sanitize_text_field($_POST['q_name']),
                    'email' => sanitize_email($_POST['q_email']),
                    'package' => sanitize_text_field($_POST['q_package']),
                    'message' => sanitize_text_field($_POST['q_msg']),
                ]);
                $formSent = true;
            }

            // contact page
            if(isset($_POST['rwd_contact_page'])) {
                $formResMsg = RwdMail::send(RWD_ADMIN_EMAIL, 'general', [
                    'name' => sanitize_text_field($_POST['q_name']),
                    'email' => sanitize_email($_POST['q_email']),
                    'message' => sanitize_text_field($_POST['q_msg']),
                ]);
                $formSent = true;
            }

        ?>

    </head>
    <body <?php body_class('header-fixed'); ?>>

		<?php wp_body_open(); ?>

        <?php if($formSent) { ?>
            <div class="form-msg">
                <div class="container">
                    <p><?php echo $formResMsg; ?></p>
                </div>
            </div>
        <?php } ?>

		<header class="<?php echo ( is_page_template('page-industry.php') ? 'header-invert' : '' ); ?>">
			<div class="container-fluid">
				<div class="d-flex align-items-center justify-content-between header-inner">
					<a href="<?php echo home_url(); ?>" class="logo_link"><h1 class="logoText">RWD</h1></a>

          <?php if (is_page_template('page-industry.php')) { ?>
              <div id="book-a-call" class="header-cta cursor-pointer book-a-call">Book a FREE Call</div>
          <?php } ?>

          <div class="burger burger-squeeze">
						<div class="burger-lines"></div>
					</div>
				</div>
			</div>
            <nav class="portfolio-nav bg-pattern-grey">

                <?php

                    wp_nav_menu( array(
                        'container' => false,
                        'theme_location' => 'main-menu'
                    ) );

                ?>
    		</nav>
		</header>
