jQuery(document).ready(function ($) {
    $('.searchInput').bind("enterKey", function (e) {
        const params_string = window.location.search.substring(1)
        const params_obj = JSON.parse('{"' + decodeURI(params_string.replace(/&/g, "\",\"").replace(/=/g, "\":\"")) + '"}');
        params_obj.s = $(this).val();
        window.location.href = location.protocol + '//' + location.host + location.pathname + '?' + objectToQueryString(params_obj)
    });

    $('.minPriceInput, .maxPriceInput').bind("enterKey", function (e) {
        const params_string = window.location.search.substring(1)
        const params_obj = JSON.parse('{"' + decodeURI(params_string.replace(/&/g, "\",\"").replace(/=/g, "\":\"")) + '"}');
        const min_price = $('.minPriceInput').val();
        const max_price = $('.maxPriceInput').val();
        if (min_price !== '') {
            params_obj.min_price = min_price
        }
        if (max_price !== '') {
            params_obj.max_price = max_price
        }
        window.location.href = location.protocol + '//' + location.host + location.pathname + '?' + objectToQueryString(params_obj)
    });

    $('.searchInput, .minPriceInput, .maxPriceInput').keyup(function (e) {
        if (e.keyCode === 13) {
            $(this).trigger("enterKey");
        }
    });

    // product
    $('.productBig .quantityEl__input').on('keyup', function () {
        $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html(
            +($(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').data("value")) * +($(this).val())
        );
    });
    $('.productBig .quantityEl__plus').click(function () {

        if ($(this).prev().val() < 1000) {
            $(this).prev().val(+$(this).prev().val() + 1);
            $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html(
                +($(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').data("value")) * +($(this).siblings('.quantityEl__input').val())
            );
        }
    });
    $('.productBig .quantityEl__minus').click(function () {
        if ($(this).next().val() > 1) {
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);

            $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html(
                +($(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').data("value")) * +($(this).siblings('.quantityEl__input').val())
            );
        }
    });

    // jQuery(document).ready(function ($) {
    $('body').on('click', '.add_to_cart', function (e) {
        e.preventDefault();
        cart.add($(this).attr('data-product_id'), $('.product_quantity').val());
    });

    $('body').on('change', '.add_to_wishlist', function (e) {
        e.preventDefault();
        if (!$(this).is(':checked')) {
            console.log('1231111');
            wishlist.remove($(this).attr('data-product_id'));
        } else {
            wishlist.add($(this).attr('data-product_id'));
        }
    });
    // })
});

function objectToQueryString(obj) {
    const str = [];

    for (const [key, value] of Object.entries(obj)) {
        console.log(`${key}: ${value}`);
        str.push(encodeURIComponent(key) + "=" + value);
    }
    return str.join("&");
}