jQuery(document).ready(function ($) {
    $('.searchInput, .minPriceInput, .maxPriceInput').keyup(function (e) {
        if (e.keyCode === 13) {
            Filter();
        }
    });

    $('.searchInput, .minPriceInput, .maxPriceInput').focusout(function (e) {
        Filter()
    });

    $('.minPriceInput').keyup(function () {
        if (parseInt($(this).val()) < parseInt($(this).attr('data-min_price_end'))) {
            $(this).val($(this).attr('data-min_price_end'));
        }
    });

    $('.maxPriceInput').keyup(function () {
        if (parseInt($(this).val()) > parseInt($(this).attr('data-max_price_end'))) {
            $(this).val($(this).attr('data-max_price_end'));
        }
    });

    $('.checkboxEl__input').click(function () {
        Filter();
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
});

function Filter() {
    const params_string = window.location.search.substring(1);
    const params_obj = JSON.parse('{"' + decodeURI(params_string.replace(/&/g, "\",\"").replace(/=/g, "\":\"")) + '"}');

    const min_price = $('.minPriceInput').val();
    const max_price = $('.maxPriceInput').val();

    // пошук
    if ($('.searchInput').val().length > 0) {
        params_obj.s = $('.searchInput').val();
    }

    // ціновий дапазон
    if (min_price !== '') {
        params_obj.min_price = min_price
    }
    if (max_price !== '') {
        params_obj.max_price = max_price
    }

    // категорії ( групи товарів )
    let categories_arr = [];
    let categories_off_arr = [];
    $('.filter_categories_block').each(function () {
        let total = 0;
        let categories = [];
        let checked = 0;
        $(this).find('.checkboxEl__input').each(function () {
            total++;
            if ($(this).prop('checked')) {
                checked++;
                categories.push($(this).attr('data-category_id'));
            }
        })

        if (checked < total) {
            if (checked === 0) {
                $(this).find('.checkboxEl__input').each(function () {
                    categories_off_arr.push($(this).attr('data-category_id'));
                })
            } else {
                categories.forEach(function (category) {
                    categories_arr.push(category);
                })
            }
        }
    })

    if (categories_arr.length > 0) {
        params_obj.categories = categories_arr
    }

    if (categories_off_arr.length > 0) {
        params_obj.categories_off = categories_off_arr
    }

    // фільтри
    let checked_arr = [];
    let unchecked_arr = [];
    $('.main_filter_block').each(function () {
        let total_ = 0;
        let filters = [];
        let checked_ = 0;
        $(this).find('.checkboxEl__input').each(function () {
            total_++;
            if ($(this).prop('checked')) {
                checked_++;
                filters.push($(this).attr('data-filter_id'));
            }
        })

        if (checked_ < total_) {
            if (checked_ === 0) {
                $(this).find('.checkboxEl__input').each(function () {
                    unchecked_arr.push($(this).attr('data-filter_id'));
                })
            } else {
                filters.forEach(function (filter) {
                    checked_arr.push(filter);
                })
            }
        }
    })

    if (checked_arr.length > 0) {
        params_obj.filters = checked_arr
    }

    if (unchecked_arr.length > 0) {
        params_obj.filters_off = unchecked_arr
    }

    window.location.href = location.protocol + '//' + location.host + location.pathname + '?' + objectToQueryString(params_obj)
}

function objectToQueryString(obj) {
    const str = [];

    for (const [key, value] of Object.entries(obj)) {
        // console.log(`${key}: ${value}`);
        str.push(encodeURIComponent(key) + "=" + value);
    }
    return str.join("&");
}