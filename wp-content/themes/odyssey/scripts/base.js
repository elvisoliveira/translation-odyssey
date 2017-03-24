(function ($) {
    // Home: Banner
    $('div.banner div.images ul').cycle();
    // Home: Team
    $('div.team div.team-members').cycle({ 
        prev:   '.prev', 
        next:   '.next', 
        timeout: 0 
    });
    $(window).scroll(function($) {
        // Stick navigation to the top of the page
        if (jQuery(window).scrollTop() > 45)
        {
            jQuery('div.nav').addClass('sticky-header');
        }
        else
        {
            jQuery('div.nav').removeClass('sticky-header');
        }
    });
})(jQuery);