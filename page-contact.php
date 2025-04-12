<?php
/* Template Name: Contact */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php include('template-parts/hero.php'); ?>

<div class="rwd-section has-secondary-background-color py-6">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <form action="" method="POST" class="footer-contact-form">

                    <input type="hidden" name="rwd_contact_page" value="yes" />

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
                            <!-- <div class="form-field">
                                <select id="package" class="input-required">
                                    <option value="">Select a package</option>
                                    <option value="lite">Lite</option>
                                    <option value="pro">Pro</option>
                                    <option value="premium">Premium</option>
                                    <span class="error"></span>
                                </select>
                            </div> -->
                            <div class="form-field">
                                <textarea class="form-input input-required" type="text" name="q_msg" id="reason" placeholder="Message..."></textarea>
                                <span class="error"></span>
                            </div>
                            <div class="form-field">
                                <button class="rwd-form-btn" id="btn-contact">Submit</button>
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


<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
