let $header = $('header');
let $navbar = $('header .navbar');
let $logo = $('header .logo img');
let logoWidth = $logo.css('width');
let $logoText = $('header .logo .serif');
let $navItems = $('header .nav-item');
let $shippingBanner = $('#shipping-banner');
let limit = $shippingBanner.outerHeight();
let $cookieAlert = $('#cookie-alert');

$(window).scroll(function() {
    let scrollTop = $(this).scrollTop();

    if (scrollTop > limit) {
        $header.removeClass('absolute-top').addClass('fixed-top');
        $navbar.addClass('border-bottom p-0').removeClass('p-2');
        $navItems.removeClass('p-4').addClass('p-3');
        $logo.css('width', '120px');
        $logoText.css('font-size', '2.12em');
        $shippingBanner.hide();

        if (! getCookie('cookie_consent'))
            $cookieAlert.show();

    } else {
        $header.removeClass('fixed-top').addClass('absolute-top');
        $navItems.removeClass('p-3').addClass('p-4');
        $navbar.removeClass('border-bottom p-0').addClass('p-2');
        $logo.css('width', logoWidth);
        $logoText.css('font-size', '2.8em');
        $shippingBanner.show();  
    }
});