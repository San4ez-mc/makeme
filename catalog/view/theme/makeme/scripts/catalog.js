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
    // $('.productBig .quantityEl__input').on('keyup', function () {
    $(document).on('keyup', '.quantityEl__input', function () {
        let min = parseInt($(this).attr('min'));
        let max = parseInt($(this).attr('max'));
        let val = parseInt($(this).val());
        $('.quantityEl__minus').attr('disabled', false);
        $('.quantityEl__plus').attr('disabled', false);

        if (val <= max && val >= min) {
            $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html(
                +($(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').data("value")) * +($(this).val())
            );
            if (val === min) {
                $('.quantityEl__minus').attr('disabled', true);
            }

            if (val === max) {
                $('.quantityEl__plus').attr('disabled', true);
            }

        } else {
            if (val < min) {
                $(this).val(min);
                $('.quantityEl__minus').attr('disabled', true);
            }
            if (val > max) {
                $(this).val(max);
                $('.quantityEl__plus').attr('disabled', true);
            }
        }
    });

    $('.productBig .quantityEl__plus').click(function () {
        let min = parseInt($(this).prev().attr('min'));
        let max = parseInt($(this).prev().attr('max'));
        let val = parseInt($(this).prev().val());
        $('.quantityEl__minus').attr('disabled', false);
        // if ($(this).prev().val() < 1000) {
        if (val < max) {
            $(this).prev().val(+val + 1);
            $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html(
                +($(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').data("value")) * +($(this).siblings('.quantityEl__input').val())
            );
            val++;
        }
        if (val === min) {
            $('.quantityEl__minus').attr('disabled', true);
        }

        if (val === max) {
            $(this).attr('disabled', true);
        }
    });
    $('.productBig .quantityEl__minus').click(function () {
        let min = parseInt($(this).next().attr('min'));
        let max = parseInt($(this).next().attr('max'));
        let val = parseInt($(this).next().val());
        $('.quantityEl__plus').attr('disabled', false);
        // if ($(this).next().val() > 1) {
        if (val > min) {
            if (val > 1) $(this).next().val(+val - 1);
            $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html(
                +($(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').data("value")) * +($(this).siblings('.quantityEl__input').val())
            );
            val--;
        }
        if (val === min) {
            $(this).attr('disabled', true);
        }
        if (val === max) {
            $('.quantityEl__plus').attr('disabled', true);
        }
    });

    $(document).on('click', '.modal-content .quantityEl__plus, #checkout_cart_page .quantityEl__plus', function () {
        let min = parseInt($(this).prev().attr('min'));
        let max = parseInt($(this).prev().attr('max'));
        let val = parseInt($(this).prev().val());
        $('.quantityEl__minus').attr('disabled', false);

        if (val < max) {
            if (!$(this).hasClass('not_add_to_cart')) {
                $(this).prev().val(+val + 1);

                let cart_id = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-cart_id');
                let amount = $(this).siblings('.quantityEl__input').val();

                const url_string = window.location.href;
                const url = new URL(url_string);
                const route = url.searchParams.get("route");

                if (!route.includes('checkout')) {
                    cart.update(cart_id, amount);
                } else {
                    cart.update(cart_id, amount, true);
                    let price = $('.lk__order-price-value').attr('data-value');
                    let currency = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-currency');
                    if ($('.total_span').length > 0) {
                        $('.total_span').text((price * amount).toFixed(2) + currency);
                    }
                    $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html((price * amount).toFixed(2) + currency);
                }
            } else {
                let quantity_input = $(this).siblings('.quantityEl__input');
                let amount = quantity_input.val();
                let price = quantity_input.attr('data-price');
                let currency = quantity_input.attr('data-currency');
                $('#product_page .productBig__price').text((price * amount).toFixed(2) + currency);
            }
            val++;
        }

        if (val === min) {
            $('.quantityEl__minus').attr('disabled', true);
        }

        if (val === max) {
            $(this).attr('disabled', true);
        }
    });

    $(document).on('click', '.modal-content .quantityEl__minus, #checkout_cart_page .quantityEl__minus', function () {
        let min = parseInt($(this).next().attr('min'));
        let max = parseInt($(this).next().attr('max'));
        let val = parseInt($(this).next().val());

        $('.quantityEl__plus').attr('disabled', false);
        if (val > min) {
            if (!$(this).hasClass('not_add_to_cart')) {
                if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
                // let price = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-price');
                // let currency = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-currency');
                let cart_id = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-cart_id');
                let amount = $(this).siblings('.quantityEl__input').val();

                // $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html((price * amount).toFixed(2) + currency);

                const url_string = window.location.href;
                const url = new URL(url_string);
                const route = url.searchParams.get("route");

                if (!route.includes('checkout')) {
                    cart.update(cart_id, amount);
                } else {
                    cart.update(cart_id, amount, true);
                    let price = $('.lk__order-price-value').attr('data-value');
                    let currency = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-currency');

                    if ($('.total_span').length > 0) {
                        $('.total_span').text((price * amount).toFixed(2) + currency);
                    }
                    $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html((price * amount).toFixed(2) + currency);
                }
            } else {
                let quantity_input = $(this).siblings('.quantityEl__input');
                let amount = quantity_input.val();
                let price = quantity_input.attr('data-price');
                let currency = quantity_input.attr('data-currency');
                $('#product_page .productBig__price').text((price * amount).toFixed(2) + currency);
            }
            val--;
        }

        if (val === min) {
            $(this).attr('disabled', true);
        }
        if (val === max) {
            $('.quantityEl__plus').attr('disabled', true);
        }
    });

    $('body').on('click', '.add_to_cart', function (e) {
        e.preventDefault();
        cart.add($(this).attr('data-product_id'), $('.product_quantity').val());
    });

    $('body').on('change', '.add_to_wishlist', function (e) {
        e.preventDefault();
        if (!$(this).is(':checked')) {
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