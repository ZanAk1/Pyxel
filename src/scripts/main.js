/***AOS effects**/
AOS.init({
  duration: 1000,
});

/*Lazyload*/
jQuery(document).ready(function() {
    var $lazy_loaded_image = jQuery('.lazyload');
    $lazy_loaded_image.lazyload().each(function() {
        var $image = jQuery(this);
        $image.trigger('lazyload');
    });
});

/*Back to Top */
jQuery("#back-top").hide();
jQuery(function () {
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 1000) {
            jQuery('#back-top').fadeIn();
            jQuery("#back-top").addClass('active');
        } else {
            jQuery('#back-top').fadeOut();
            jQuery("#back-top").removeClass('active');
        }
    });
    jQuery('#back-top').click(function () {
        jQuery('body,html').animate({
            scrollTop: 0
        }, 1200);        return false;
    });
});

