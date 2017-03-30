(function($) {
    // Home: Banner
    $('body.home div.banner div.images ul').cycle();
    // Home: Team
    $('body.home div#team div.team-members').cycle({
        prev: '.prev',
        next: '.next',
        timeout: 0
    });
    // Home: Stcky menu
    $('body.home div.nav a').click(function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: ($('div' + $(this).attr('href')).offset().top) - (jQuery('body').hasClass('logged-in') ? 82 : 60)
        }, 1000);
    });
    $(window).scroll(function($) {
        // Stick navigation to the top of the page
        var scrollWindow = jQuery(window).scrollTop();
        var scrollOffset = jQuery('body').hasClass('logged-in') ? 32 : 0;
        var scrollBanner = jQuery('div.banner').offset().top - scrollOffset;
        jQuery('div.nav').removeClass('sticky-header admin-sticky-header').addClass(scrollWindow > scrollBanner ? jQuery('body').hasClass('logged-in') ? 'admin-sticky-header' : 'sticky-header' : '');
    });
})(jQuery);
