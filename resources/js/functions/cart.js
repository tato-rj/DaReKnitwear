updateCartLink = function()
{
    if ($('#cart-modal').length) {
        let cartLink = withoutParams($('#cart-link').attr('href'));
        let checkoutLink = withoutParams($('#cart-modal #checkout-link').attr('href'));

        $('#cart-link').attr('href', cartLink + '?cart_id=' + window.app.visitor_id);
        $('#cart-modal #checkout-link').attr('href', checkoutLink + '?cart_id=' + window.app.visitor_id);
		
		console.log('Cart and checkout links updated');
    }
}