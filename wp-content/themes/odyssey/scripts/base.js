(function($) {
    // Home: Banner
    $('div.banner div.images ul').cycle();
    // Home: Team
    $('div.team div.team-members').cycle({ 
        prev:   '.prev', 
        next:   '.next', 
        timeout: 0 
    });
})(jQuery);