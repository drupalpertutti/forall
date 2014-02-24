jQuery(function($){
    $('nav .block-menu .content').prepend('<a href="#" class="mobile_menu_button">Menu</a>');
    $('nav .mobile_menu_button').live('click', function(e){
        e.preventDefault();
        $(this).siblings('ul.menu').toggleClass('mobile_toggle');
    });
});