    console.log('WOOO');

jQuery(document).ready(function() {



    jQuery('.icon-help').click(function() {
        jQuery('.modal').addClass('show');
    });

    jQuery('.close-modal').click(function() {
        jQuery('.modal').removeClass('show');
    });
});
