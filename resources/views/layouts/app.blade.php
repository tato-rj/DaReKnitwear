<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script>
        window.app = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'currency' => '$'
        ]); ?>
    </script>

    @stack('head')
</head>
<body data-visitor-url="{{route('visitor.store')}}">
    <brand style="display: none">
        <colors>
            <primary class="text-primary"></primary>
            <secondary class="text-secondary"></secondary>
        </colors>
    </brand>

    @include('layouts.header.menu.layout')

    @yield('content')

    @include('components/alerts/cookies')

    @if(session()->has('status'))
    @include('components.alerts.success', ['message' => session('status')])
    @endif

    @if(session()->has('error'))
    @include('components.alerts.error', ['message' => session('error')])
    @endif

    @include('layouts.footer.index')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    <script type="text/javascript">
        document.addEventListener("keydown", function(event) {
            alert(event.which);
           // if(event.which == 76) {
           //      $logo = $('.logo img');

           //      if ($logo.hasClass('icon-changed')) {
           //          $logo.attr('src', $logo.attr('data-src1'));
           //      } else {
           //          $logo.attr('src', $logo.attr('data-src2'));
           //      }

           //      $logo.toggleClass('icon-changed');
           // }
            console.log(event.which);
        }
    </script>

    <script type="text/javascript">
    // new HelperBadge({
    //     color: $('brand colors primary').css('color')
    // }); 
    // resetCookies(['dare_visitor_id']);
    </script>

<script type="text/javascript">
// MENU FOR STORE OVERVIEW ON MAIN PAGE
$('#overview-menu span').on('click', function() {
    let $menu = $(this);
    let $menuItems = $menu.siblings();
    let $target = $($menu.attr('data-target'));

    $menu.removeClass('text-muted').addClass('border-bottom border-dark');
    $menuItems.removeClass('border-bottom border-dark').addClass('text-muted');

    $target.show();
    $target.siblings().hide();
});
</script>

<script type="text/javascript">
$('.product .image').on({
    mouseenter: function() {
        $(this).find('.add-container').show();
        $(this).find('.note').hide();
    },
    mouseleave: function() {
        $(this).find('.add-container').hide();
        $(this).find('.note').show();        
    }
});

$('.product .original').on('mouseenter', function() {
    $(this).hide();
    $(this).siblings('.sizes').show();
});

$('.product .sizes').on('mouseleave', function() {
    $(this).hide();
    $(this).siblings('.original').show();
});
</script>

<script type="text/javascript">
let $cart;

$(document).ready(function() {
    $cart = $('.cart');
// 
    loadCart();

    $cart.on('click', '.remove', function() {
        let $item = $(this).closest('.cart-item');

        removeAll($item);
    });

    $cart.on('click', '.quantity-decrease', function() {
        let $item = $(this).closest('.cart-item');
        let quantity = getQuantity($item);

        if (quantity > 1) {
            let newCount = quantity - 1;

            decreaseItemQuantity($item, newCount);
        }
    });

    $cart.on('click', '.quantity-increase', function() {
        $button = $(this).removeClass('quantity-increase');
        let $item = $button.closest('.cart-item');
        let newCount = getQuantity($item) + 1;

        increaseItemQuantity($item, newCount, $button);
    });

    $('body').on('click', '.cart-add:not(.btn-disabled)', function() {
        let $item = $(this);
        let $sizes = $item.parent();
        let $options = $sizes.parent();
        let $original = $sizes.siblings('.original');
        let $adding = $sizes.siblings('.adding');
        let $success = $sizes.siblings('.success');
        let $fail = $sizes.siblings('.fail');
        let $error = $sizes.siblings('.error');
        let url = $item.attr('data-url');

        toggleControls($original, $sizes);

        updateMessage($adding);


        $.post(url, {'cart_id': window.app.visitor_id}, function(item) {
            updateMessage($success);

            if (inCart($cart, item.json)) {
                let $existingItem = findInCart(item.json);
                let newCount = getQuantity($existingItem) + 1;
                
                saveToCart($existingItem, newCount);
            } else {
                $cart.append(item.html);

                updateCartQuantity();

                updateCartPrice();
            }
        }).fail(function(response) {

            if (response.status == 500) {

                updateMessage($error);

            } else {

                updateMessage($fail);

            }

        }).always(function() {

            setTimeout(function() {

                toggleControls($original, $sizes);

                updateMessage($original);

            }, 1250);

        });
    });

});

$('body').on('click', '.heart', function() {
    toggleFavorite($(this));
});

function toggleFavorite(heart)
{
    heart.removeClass('heart');

    $.post(heart.attr('data-url'),
    {
        product_id: heart.attr('data-product-id'),
        user_id: null
    }, 
    function(response){

        if (heart.hasClass('far'))
            heart.playAnimation('rubberBand');
    
        heart.toggleClass('fas far');
    }).fail(function(response) {
        console.log(response);
    }).always(function() {
        heart.addClass('heart');
    });
}

jQuery.fn.playAnimation = function(animation) {
    $icon = this;
    
    $icon.addClass(animation);

    setTimeout(function(){
        $icon.removeClass(animation);
    }, 500);

    return $icon;
};

jQuery.fn.textToInt = function() {
    return parseInt(this.text());
};
</script>
<script type="text/javascript">
$('#what-we-do .banner').on('mouseenter', function() {
    $banner = $(this);
    $banner.find('.text').addClass('mb-5');
    $banner.find('.btn').css('opacity', 1);
});
$('#what-we-do .banner').on('mouseleave', function() {
    $banner = $(this);
    $banner.find('.text').removeClass('mb-5');
    $banner.find('.btn').css('opacity', 0);
});


</script>

{{-- CART FUNCTIONS --}}
<script type="text/javascript">

function updateMessage(container)
{
    container.show();
    container.siblings().hide();
}

function toggleControls(original, sizes)
{
    original.toggleClass('original');
    sizes.toggleClass('sizes');
}

function increaseItemQuantity(item, newCount, button = null, updateTotal = true)
{
    let url = item.attr('data-add-url');

    item.find('.loading').fadeIn('fast');

    return $.post(url, {
        'cart_id': window.app.visitor_id,
        'quantity': newCount
    }, function(available) {
        
        saveToCart(item, newCount, updateTotal);

    }).fail(function(response) {
        $('.cart-icon').playAnimation('wobble');

        if (response.status == 413) outOfStock(item, response.responseJSON.message);
    
    }).always(function() {

        item.find('.loading').fadeOut('fast');

        if (button) button.addClass('quantity-increase');

    });
}

function decreaseItemQuantity(item, newCount, button = null, updateTotal = true)
{
    let url = item.attr('data-delete-url');

    item.find('.loading').fadeIn('fast');

    return $.post(url, {
        'cart_id': window.app.visitor_id
    }, function(available) {
        
        saveToCart(item, newCount, updateTotal);

    }).fail(function(response) {
        $('.cart-icon').playAnimation('wobble');

        if (response.status == 413) outOfStock(item, response.responseJSON.message);
    
    }).always(function() {

        item.find('.loading').fadeOut('fast');

        if (button) button.addClass('quantity-increase');

    });
}

function removeAll(item)
{
    let url = item.attr('data-delete-all-url');

    return $.post(url, {
        'cart_id': window.app.visitor_id
    }, function(available) {
        item.remove();

        updateCartPrice();
        
        updateCartQuantity();
    }).fail(function(response) {
        if (response.status == 413) outOfStock(item, response.responseJSON.message);
    });
}

function saveToCart(item, newCount, updateTotal = true, animateIcon = true)
{
    item.find('.item-quantity').text(newCount);

    item.attr('data-quantity', newCount);

    updateItemPrice(item, newCount);

    if (updateTotal) {
        updateCartQuantity(animateIcon);
        updateCartPrice();
    };
}

function updateCartQuantity(animateIcon = true)
{
    let totalQuantity = 0;

    $cart.find('.cart-item').each(function() {
        let $item = $(this);
        let quantity = parseInt($item.attr('data-quantity'));

        totalQuantity += quantity;
    });

    if (totalQuantity == 0) {
        $('.cart, .cart-checkout, .cart-badge').hide();
        $('.cart-empty').show();
    } else {
        $('.cart, .cart-checkout, .cart-badge').show();
        $('.cart-empty').hide();
    }

    $('.cart-quantity').text(totalQuantity);

    if (animateIcon)
        $('.cart-icon').playAnimation('rubberBand');
}

function updateItemPrice(item, count)
{
    let newPrice = item.attr('data-unit-price') * count;

    item.find('.item-price').text(app.currency + newPrice);
}

function updateCartPrice()
{
    let totalPrice = 0;

    $cart.find('.cart-item').each(function() {
        let $item = $(this);
        let price = parseInt($item.attr('data-unit-price'));
        let quantity = parseInt($item.attr('data-quantity'));

        totalPrice += price * quantity;
    });

    $('.cart-price').text(app.currency + totalPrice);
}

function getQuantity(item)
{
    let quantity = item.find('.item-quantity').textToInt();

    return quantity;
}

function findInCart(item)
{
    return $('.cart-item[data-product-slug="'+item.product.slug+'"][data-product-id="'+item.product_id+'"][data-color="'+item.color+'"][data-size="'+item.size+'"]');
}

function inCart(cart, item)
{
    return findInCart(item).length !== 0;
}

function outOfStock(item, message)
{
    item.find('.out-of-stock span').text(message);
    item.find('.out-of-stock').fadeIn('fast', function() {
        $overlay = $(this);
        setTimeout(function(){$overlay.fadeOut('fast');}, 750);
    });
}

function loadCart()
{
    let url = $('#cart-modal').attr('data-url');

    if ($('#cart-modal').length) {
        $.get(url, {'cart_id': window.app.visitor_id}, function(data) {

            data.forEach(function(item){

                if (inCart($cart, item.json)) {
                    let $existingItem = findInCart(item.json);
                    let newCount = getQuantity($existingItem) + 1;
                    
                    saveToCart($existingItem, newCount, updateTotal = true, animateIcon = false);
                } else {
                    $cart.append(item.html);

                    updateCartQuantity(animateIcon = false);

                    updateCartPrice();
                }
            });
        }).fail(function(data) {
            console.log(data.responseJSON.message);
        });
    }
}
</script>

@stack('js')
</body>
</html>
