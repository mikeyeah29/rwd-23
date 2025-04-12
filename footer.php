<footer>

    <div class="footer-darker">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <!-- <div class="header-bar__icons mb-3">
                        <img src="img/social_icons/fb.png">
                        <img src="img/social_icons/tw.png">
                        <img src="img/social_icons/ig.png">
                        <img src="img/social_icons/yt.png">
                    </div> -->
                    <h1 class="logoText logoText--footer"><?php echo get_bloginfo('name'); ?></h1>
                    <p>Copyright © <?php echo date('Y'); ?>. <?php echo get_bloginfo('name'); ?>. All Rights Reserved.</p>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">

        jQuery(document).ready(function($){

            var main_menu = $('.portfolio-nav');
            var burger = $('.burger');

            burger.on('click', function(){
                if(burger.hasClass('is-open')){
                    burger.removeClass('is-open');
                    main_menu.removeClass('is-open');
                }else{
                    burger.addClass('is-open');
                    main_menu.addClass('is-open');
                }
            });

            main_menu.find('a').on('click', function(e) {
                var href = jQuery(e.currentTarget).attr('href');
                if(href === '/#footer_contact') {
                    burger.removeClass('is-open');
                    main_menu.removeClass('is-open');
                }
            });

            function typeWriter(id) {

                let el = document.getElementById(id);

                if(!el) {
                    return;
                }

                let text = el.innerText;

                el.innerHTML = "";

                // set a counter for the index of character in the string
                let counter = 0;

                // create a function that will type one character of the string
                // at a time with the interval set
                let type = () => {
                  el.innerHTML += text[counter];
                  // make it look more human
                  let interval = Math.floor(Math.random() * (10 - 10 + 1) + 100);
                  counter++;
                  if (counter < text.length) {
                    setTimeout(type, interval);
                  }
                };

                // call the type function
                type();
            }


            typeWriter('typedtext');

            // SCROLL

            window.addEventListener('scroll', function() {
              var header = document.querySelector('header');
              var invertPoint = document.getElementById('header-invert-point');

              if(invertPoint) {
                var invertPointPosition = invertPoint.getBoundingClientRect().top + window.scrollY;
                var headerBottomPosition = header.getBoundingClientRect().bottom + window.scrollY;

                if (headerBottomPosition > invertPointPosition) {
                  header.classList.add('header-invert');
                } else {
                  header.classList.remove('header-invert');
                }
              }

            });

        });

        function smoothScrollTo(targetSelector) {
          const targetElement = document.querySelector(targetSelector);

          if (targetElement) {
            const targetOffset = targetElement.offsetTop;
            window.scrollTo({
              top: targetOffset,
              behavior: 'smooth'
            });
          }
        }

        function selectPackage(targetSelector, selectedPackage)
        {
            smoothScrollTo(targetSelector);
            document.getElementById('package').value = selectedPackage;
        }

        jQuery('.icon-help').click(function() {
            var index = jQuery(this).closest('tr').index() + 1;
            jQuery('#rwd-modal-' + index).addClass('show');
        });

        jQuery('.close-modal').click(function() {
            jQuery('.rwd-modal').removeClass('show');
        });

        jQuery(document).click(function(event) {
            if (!jQuery(event.target).closest('.rwd-modal-content').length && !jQuery(event.target).closest('.icon-help').length) {
              jQuery('.rwd-modal').removeClass('show');
            }
          });

    </script>

    <?php wp_footer(); ?>

</footer>
</body>

</html>
