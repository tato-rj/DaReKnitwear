function saveVisitorID()
{
    window.app.visitor_id = getCookie('dare_visitor_id');

    if (isNull(window.app.visitor_id)) {
        let url = $('body').attr('data-visitor-url');

        $.post(url, {}, function(data, status){
            setCookie('dare_visitor_id', data.visitor_id, 730);

            window.app.visitor_id = getCookie('dare_visitor_id');
	    	
	    	console.log('Created a new visitor ID: ' + window.app.visitor_id);
    		updateCartLink();
        }).fail(function(response) {
        	console.log(response);
        });

    } else {
    	console.log('Retrieved existing visitor ID: ' + window.app.visitor_id);
    	updateCartLink();
    }
}

function saveCookieConsent()
{
    window.app.cookie_consent = getCookie('cookie_consent');
}

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': app.csrfToken
    }
});

saveCookieConsent();

if (isNull(window.app.cookie_consent)) {
    // SET COOKIE CONSENT COOKIE
    $('#cookie-alert button').on('click', function() {
        let $alert = $('#cookie-alert');

        setCookie('cookie_consent', 'cookies from darestore', 730);

        saveVisitorID();

        $alert.addClass('bounceOutDown');

        setTimeout(function() {
            $alert.remove();
        }, 500);
    });
} else {
    saveVisitorID();
}

smoothLoad('.products-container');

$('.modal-with-errors').modal('show');
