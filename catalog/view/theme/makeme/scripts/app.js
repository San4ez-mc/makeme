/*jslint browser, es6 */
/*global window */

jQuery.event.special.touchstart = {
    setup: function (_, ns, handle) {
        this.addEventListener("touchstart", handle, {passive: !ns.includes("noPreventDefault")});
    }
};

window.onload = function () {
    var lazyLoadInstance = new LazyLoad({
        // Your custom settings go here
    });
    window.setTimeout(function () {
        $('.preloader').addClass('hide');
    }, 500);
    if ($(window).width() > 991) {
        $('.constructor__menu-list .el__imgContainer').addClass('el__add');
    }

    function constructorMenuListCarousel() {
        if ($(window).width() < 575) {
            $('.constructor__menu-list').addClass('owl-carousel');
            $('.constructor__menu-list').owlCarousel({
                items: 1,
                dots: false,
                loop: true,
                nav: true
            })
        } else {
            $('.constructor__menu-list').removeClass('owl-carousel');
            $('.constructor__menu-list').trigger('destroy.owl.carousel');
        }
    }

    constructorMenuListCarousel();
    $(window).on('resize', function () {
        constructorMenuListCarousel();
        if ($(window).width() > 991) {
            $('.constructor__menu-list .el__imgContainer').addClass('el__add');
        } else {
            $('.constructor__menu-list .el__imgContainer').removeClass('el__add');
        }


    });
    $(window).on('scroll', function () {
        if ($('.parallaxBalls').length) {
            if ($('.parallaxBalls').offset().top < $(window).scrollTop() + $(window).height()) {
                $('.parallaxBalls').addClass('active');
                $('.parallaxBalls').css({
                    'top': $(window).scrollTop() / 4
                });
            }
        }
    });
    $('.ticker').trigger('next.owl.carousel', [3000]);

    if ($('.productBig__imgCarousel').length) {
        $('.productBig__imgCarousel').owlCarousel({
            dots: true,
            items: 1
        });
    }

    if ($('.carousel-3els').length) {
        $('.carousel-3els').owlCarousel({
            dots: true,
            items: 1,
            navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2,
                    margin: 20
                },
                767: {
                    items: 2,
                    nav: false,
                    margin: 20
                },
                991: {
                    items: 3,
                    nav: true,
                    margin: 20
                },
                1199: {
                    items: 3,
                    nav: true,
                    margin: 40
                },
            }
        });
    }
    if ($('.carousel-4els').length) {
        $('.carousel-4els').owlCarousel({
            dots: true,

            navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 2,
                    margin: 8
                },
                575: {
                    items: 2,
                    margin: 10
                },
                767: {
                    items: 2,
                    nav: false,
                    margin: 20
                },
                991: {
                    items: 3,
                    nav: true,
                    margin: 20
                },
                1199: {
                    items: 4,
                    nav: true,
                    margin: 24
                },
            }
        });
    }

    // ?????????????????? ???????????? ?????????? ?? ??????????????????????
    if ($('.el__add.basis').length > 0) {
        $('.el__add.basis').trigger('click');
    }
};

$('.lk__order-products .quantityEl__input').on('keyup', function () {
    $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html(
        +($(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').data("value")) * +($(this).val())
    );
});


$(document).on('click', '.lk__order-products .quantityEl__plus', function () {
    if ($(this).prev().val() < 1000) {
        $(this).prev().val(+$(this).prev().val() + 1);
        // let price = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-price');
        // let currency = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-currency');
        let cart_id = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-cart_id');
        let amount = $(this).siblings('.quantityEl__input').val();
        // $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html((price * amount).toFixed(2) + currency);
        cart.update(cart_id, amount);
    }
});

$(document).on('click', '.lk__order-products .quantityEl__minus', function () {
    if ($(this).next().val() > 1) {
        if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);

        // let price = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-price');
        // let currency = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-currency');
        let cart_id = $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').attr('data-cart_id');
        let amount = $(this).siblings('.quantityEl__input').val();

        // $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html((price * amount).toFixed(2) + currency);

        cart.update(cart_id, amount);
    }
});


$('.productFilters--toggle').on('click', function () {
    $('.productFilters, .productFilters__bg').toggleClass('active');
    $('body').toggleClass('overflow-hidden');
});
$('.dropdown-item').on('click', function () {
    $(this).siblings().removeClass('active');
    $(this).addClass('active');
    $(this).closest('.dropdown').find('.dropdown__value').html($(this).text());
});
if ($('#timerCountdown').length) {
    $('#timerCountdown').countdown({
        date: '12/24/2022 23:59:59'
    });
}
$('.menuMobileToggle--js').on('click', function () {
    $('.menuMobile').toggleClass('active');
});

if ($('.ticker').length) {
    $('.ticker').owlCarousel({
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 3000,
        loop: true,
        autoplaySpeed: 3000,
        mouseDrag: false,
        touchDrag: false,
        pullDrag: false,
        freeDrag: false,
        autoWidth: true,
        margin: 0
    });
}

if ($('input.number').length) {
    $('input.number').mask('0000000000');
}
if ($('.quantityEl__input').length) {
    $('.quantityEl__input').mask('000');
}
if ($('input[type="tel"]').length) {
    $('input[type="tel"]').mask('+38 000 000 00 00');
}
if ($('input.birthday').length) {
    $('input.birthday').mask('00.00.0000');
}

function ValidateEmail(inputText) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputText.value.match(mailformat)) {
        $('#modalChangeEmailSuccess').modal('show');
    } else {
        $('#modalChangeError').modal('show');
    }
}


$('.form__field-passwordShow').on('click', function () {
    $(this).toggleClass('active');
    if ($(this).siblings('.form__field-input--password').attr('type') == 'password') {
        $(this).siblings('.form__field-input--password').prop('type', 'text');
    } else {
        $(this).siblings('.form__field-input--password').prop('type', 'password');
    }
});

$('.productCard__remove').on('click', function () {
    $('#modalShureRemove').modal('show');
});


$('.form__promocode input').on('keyup', function () {
    if ($(this).val().length > 0) {
        $(this).closest('.form__promocode').find('.button').prop('disabled', null);

    } else {
        $(this).closest('.form__promocode').find('.button').prop('disabled', true);
    }
});
if ($('.select2-city').length) {
    $('.select2-city').select2({
        placeholder: "?????????????? ?????????????? ??????????",
        allowClear: true
    });
}
if ($('.select2-postBranch').length) {
    $('.select2-postBranch').select2({
        placeholder: "?????????????? ?????????? ?????????????????? ?????? ??????????",
        allowClear: true
    });
}

$('.form__radio-input').on('change', function () {
    $('.form__radioEl-body').removeClass('active');
    $(this).closest('.form__radioEl').siblings('.form__radioEl').removeClass('active');
    $(this).closest('.form__radioEl').addClass('active').find('.form__radioEl-body').addClass('active');
    $(this).closest('.checkout__el').find('.checkout__fields-next').prop('disabled', true);
});

$('.checkout__fields-next').on('click', function () {
    $(this).closest('.checkout__el').addClass('filled');
    $(this).closest('.checkout__el').next('.checkout__el').removeClass('empty');
    if ($('.checkout__el.filled').length == 2) {
        $('.orderButton').prop('disabled', null);
    }
});
$('.stage1 .checkout__fields-next').on('click', function () {
    $('#checkout__name').text($('#checkout__nameInput').val());
    $('#checkout__surname').text($('#checkout__surnameInput').val());
    $('#checkout__tel').text($('#checkout__telInput').val());
    $('#checkout__email').text($('#checkout__emailInput').val());
});
$('.stage2 .checkout__fields-next').on('click', function () {
    $('#checkout__postBranch').html($(this).closest('.checkout__el').find('.form__radioEl.active .form__radio-body-text').text());
    $('#checkout__city').html($('.select2-city').val());
    $('#checkout__postBranchAddress').html($(this).closest('.checkout__el').find('.form__radioEl.active .select2-postBranch').val());
});
$('.checkout__edit').on('click', function () {
    $(this).closest('.checkout__el').removeClass('filled');
    $('.orderButton').prop('disabled', true);
});


$('.stage1 input').on('keyup', function () {
    let k = 0;
    for (let i = 0; i < $('.stage1 input').length; i++) {

        if ($('.stage1 input').eq(i).val()) {
            k++;
        }
        if (k == $('.stage1 input').length) {
            $(this).closest('.checkout__fields').find('.checkout__fields-next').prop('disabled', null);
            /*if($('.checkout__el.filled').length == 1) {
              $('.orderButton').prop('disabled', null);
            }*/
        } else {
            $(this).closest('.checkout__fields').find('.checkout__fields-next').prop('disabled', true);
            // $('.orderButton').prop('disabled', true);
        }
    }
});

$('.select2-city').on('select2:select', function () {
    $(this).closest('.checkout__fields').find('.form__radios').addClass('active');
});

$('.stage2 .select2-city').on('select2:clear', function () {
    $(this).closest('.checkout__fields').find('.form__radios').removeClass('active');
    $('.select2-postBranch').val(null).trigger('change');
    // $('.orderButton').prop('disabled', true);
});

$('.select2-postBranch').on('select2:select', function () {
    $(this).closest('.checkout__fields').find('.checkout__fields-next').prop('disabled', null);
    // if($('.checkout__el.filled').length == 1) {
    //   $('.orderButton').prop('disabled', null);
    // }
});

$('.select2-postBranch').on('select2:clear', function () {
    $(this).closest('.checkout__fields').find('.checkout__fields-next').prop('disabled', true);
    // $('.orderButton').prop('disabled', true);
    /*let k = 0;
    for(let i = 0; i < $('.select2-postBranch').length; i++) {
      if($('.stage2 .select2-postBranch').eq(i).val()) {
        k++;
      }
      if(k) {
        $(this).closest('.checkout__fields').find('.checkout__fields-next').prop('disabled', null);
      } else {
        $(this).closest('.checkout__fields').find('.checkout__fields-next').prop('disabled', true);
      }
    }*/
});

$('input[name="deliveryMethod"]').on('change', function () {
    $('.select2-postBranch').val(null).trigger('change');
    // $(this).closest('.checkout__fields').find('.checkout__fields-next').prop('disabled', true);
});

$('.constructorTabs__skinType_block').on('click', function () {
    location.href = $(this).attr('data-url');
});

// $('.constructorTabs__el').on('click', function () {
//     $('body,html').animate({scrollTop: top}, 0);
//     const el = $(this);
//     if (el.closest('.tab-pane').next('.tab-pane').length) {
//         el.closest('.tab-pane').removeClass('show active').next('.tab-pane').addClass('active show');
//         $('.constructorTabs__nav-el').eq(el.closest('.tab-pane').index()).removeClass('active');
//         $('.constructorTabs__nav-el').eq(el.closest('.tab-pane').index() + 1).attr('data-toggle', 'tab').addClass('active');
//     }
// });
//
// $('.constructorTabs__skinType').on('click', function () {
//     const body_part = $('[name="body_part"]').val();
//     const product_type = $('[name="product_type"]').val();
//     const skin_type = $(this).find('[name="skin_type"]').val();
//     const url = $(this).parents('.constructorTabs__tab-body').attr('data-constructor_url');
//     location.href = url + '&body_part=' + body_part + '&product_type=' + product_type + '&skin_type=' + skin_type;
// });


$('.constructorTabs__nav-el').on('click', function () {
    $('body,html').animate({scrollTop: top}, 0);
})

$('.constructor__menu-list').on('click', '.el__add', function () {
    const amount = $('.added_component').length;
    if (amount < 5 && !$(this).closest('.el').hasClass('active')) {
        // $('.constructor__product-body').addClass('active');
        $('.constructor__product').hide();
        $('.constructor__product-preloader').show();

        $(this).closest('.el').addClass('active');
        const id = $(this).closest('.el').attr('id');
        const component_id = $(this).closest('.el').attr('data-component_id');
        const price_ = $(this).closest('.el').attr('data-price');
        const img = $(this).closest('.el').find('.el__img').attr('src');
        const name = $(this).closest('.el').find('.el__title').text();
        const price = $(this).closest('.el').find('.el__tooltip-footer-price').text();
        const video_src = $('#constructor__product-video').attr('data-video_url');

        // ?????????????????? ???????????????????? ?? ?????????? ??????????????
        $('.constructor__components .constructor__collapse-body').append(`
            <div 
                class="constructor__components-el added_component" 
                data-id="${id}"
                data-component_id="${component_id}"
                data-price="${price_}"
            >
              <span class="constructor__components-el-imgContainer">
                <img src="${img}" alt="${name}" class="constructor__components-el-img">
              </span>
              <span class="constructor__components-el-body">
                <span class="constructor__components-el-name">${name}</span>
                <span class="constructor__components-el-value">${price}</span>
              </span>
              <span class="constructor__components-el-remove"></span>
            </div>
        `);

        // ?????????????????? ?????????? ????????
        let total_price = 0;
        const total_span = $('.constructor__components-sum-value');
        const currency = total_span.text().substring(total_span.text().length - 1);
        $('.added_component').each(function (index) {
            total_price += parseInt($(this).attr('data-price'));
        })
        $('.constructor__components-sum-value').text(total_price + currency);
        $('.constructor__components-sum-value').attr('data-total', total_price);

        // ?????????????????? ???????????????????? ???????????????????? ?? ?????????????? ???????? ????????
        $('.constructor__product-body').append(`
            <div class="constructor__product-el" data-id="${id}">
              <span class="constructor__product-el-imgContainer">
                <img src="${img}" alt="#" class="constructor__product-el-img">
              </span>
              <span class="constructor__product-el-name">${name}</span>
            </div>
         `);

        // ???????????? ??????????
        $('#constructor__product-video').attr('src', video_src + '/' + (parseInt(amount) + 1) + '.webm');

        setTimeout(function () {
            $('.constructor__product-preloader').hide();
            $('.constructor__product').show();
        }, 500)
    }
});

$('.constructor__components').on('click', '.constructor__components-el-remove', function () {
    if ($('.constructor__menu .el.active').length == 1) {
        $('.constructor__product-body').removeClass('active');
    }
    for (let i = 0; i < $('.constructor__menu .el').length; i++) {
        if ($(this).closest('.constructor__components-el').data('id') == $('.constructor__menu .el').eq(i).attr('id')) {
            $('.constructor__menu .el').eq(i).removeClass('active');
        }
    }

    // ?????????????????? ?????????? ?? ????????????????
    for (let i = 0; i < $('.constructor__product-el').length; i++) {
        if ($(this).closest('.constructor__components-el').data('id') == $('.constructor__product-el').eq(i).data('id')) {
            $('.constructor__product-el').eq(i).remove();
        }
    }
    $(this).closest('.constructor__components-el').remove();
});

$('.modalProductNaming input').on('keyup', function () {
    if ($(this).val()) {
        $(this).closest('.form').find('.button').prop('disabled', null);
    } else {
        $(this).closest('.form').find('.button').prop('disabled', true);
    }
});

$('.constructorResults').on('click', function () {
    $('.constructor__menu, .constructor__product-el, .constructor__product .constructor__components-footer').addClass('d-none');
    $('.constructor__product').addClass('active');
    $('.constructor__components').addClass('d-block');
    $('.constructor>.constructor__menu-header').addClass('d-none').removeClass('d-block');
});
$('.backToComponents').on('click', function () {
    $('.constructor__menu, .constructor__product-el, .constructor__product .constructor__components-footer').removeClass('d-none');
    $('.constructor__product').removeClass('active');
    $('.constructor__components').removeClass('d-block');
    $('.constructor .constructor__menu-header').removeClass('d-none').addClass('d-block');
    if ($('.constructor__components-el').length > 1) {
        $('.constructor__product-body').addClass('active');
    } else {
        $('.constructor__product-body').removeClass('active');
    }
});


$("a.scrollto").on("click", function (event) {
    //???????????????? ?????????????????????? ?????????????????? ?????????????? ???? ????????????
    event.preventDefault();

    //???????????????? ?????????????????????????? ???????? ?? ???????????????? href
    const id = $(this).attr('href'),

        top = $(id).offset().top - 10;
    $('body,html').animate({scrollTop: top}, 1000);
});


$(function () {
    $(".delayedLinkToBasket").click(function (evt) {
        const button = $(this);
        const name = button.parents('form').find('input').val();
        const cat = button.attr('data-cat');
        const subcat = button.attr('data-subcat');
        const filter_id = button.attr('data-filter_id');
        const cart_url = button.attr('data-cart_url');
        const total = $('.constructor__components-sum-value').attr('data-total');
        let components_ids = [];
        $('.added_component').each(function (index) {
            components_ids.push($(this).attr('data-component_id'))
        })

        const data = {
            name: name,
            cat: cat,
            subcat: subcat,
            filter_id: filter_id,
            components: components_ids,
            total: total
        }

        $.ajax({
            type: "POST",
            url: '/index.php?route=constructor/constructor/save',
            // data: form.serialize() + '&' + $.param(data),
            data: data,
            success: function (data) {
                console.log(data);
                data = JSON.parse(data);
                if (data.status === 'ok') {
                    window.location = cart_url;
                } else {
                    console.log(data.message);
                }
            }
        });

        // setTimeout(function () {
        //     window.location.href = "basket.html";
        // }, 4000);
    });
});


$('.productBig .aboutComponents__el').on('click', function () {
    $(this).toggleClass('active');
});
if ($('input.birthday').length) {
    $('input.birthday').datepicker({
        dateFormat: "dd.mm.yy"
    });
}


$('.lk__desires-nav-el').on('click', function () {
    $('.lk__desires-nav-el').removeClass('active');
    $(this).addClass('active');
    $('.lk__desires-body .productCard').parent().addClass('d-none');
    for (let i = 0; i < $('.lk__desires-body .productCard').length; i++) {
        if ($(this).data('target') == $('.lk__desires-body .productCard').eq(i).data('type')) {
            $('.lk__desires-body .productCard').eq(i).parent().removeClass('d-none');
        }
    }
    if ($(this).data('target') == 'all') {
        $('.lk__desires-body .productCard').parent().removeClass('d-none');
    }
});

$('.productCard').on('click', '.productCard__remove', function () {
    $(this).closest('.productCard').addClass('toRemove');
});

$('#modalShureRemove')
    .on('click', '.button--primary', function () {
        $('.productCard.toRemove').parent().remove();
    })
    .on('hidden.bs.modal', function (event) {
        $('.productCard.toRemove').removeClass('toRemove');
    });

// if($('.videoBG').length) {
//   document.getElementsByClassName('.videoBG').play();
// }

$(document).on('click', '.make_recipe_available', function () {
   console.log('12321332');
});