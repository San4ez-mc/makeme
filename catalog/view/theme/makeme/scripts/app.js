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

    // добавляем основу сразу в конструктор
    if ($('.el__add.basis').length > 0) {
        $('.el__add.basis').trigger('click');
    }
};

// $('.lk__order-products .quantityEl__input').on('keyup', function () {
//     console.log('app.js');
//     // todo добавити перевірку на максимальну кількість
//     // let min = parseInt($(this).attr('min'));
//     // let max = parseInt($(this).attr('max'));
//     // let val = parseInt($(this).val());
//     // console.log(min, max, val);
//     // $('.lk__order-products .quantityEl__minus').attr('disabled', false);
//     // $('.lk__order-products .quantityEl__plus').attr('disabled', false);
//     // if (val <= max && val >= min) {
//         $(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').html(
//             +($(this).closest('.quantityEl').siblings('.lk__order-price').find('.lk__order-price-value').data("value")) * +($(this).val())
//         );
//     //     if (val === min) {
//     //         $('.lk__order-products .quantityEl__minus').attr('disabled', true);
//     //     }
//     //
//     //     if (val === max) {
//     //         $('.lk__order-products .quantityEl__plus').attr('disabled', true);
//     //     }
//     //
//     // } else {
//     //     if (val < min) {
//     //         $(this).val(min);
//     //         $('.lk__order-products .quantityEl__minus').attr('disabled', true);
//     //     }
//     //     if (val > max) {
//     //         $(this).val(max);
//     //         $('.lk__order-products .quantityEl__plus').attr('disabled', true);
//     //     }
//     // }
// });


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

// це для видалення з рецептів, потім треба буде точніше вказати селектор, бо він спрацьовує в корзині
$('.productCard__remove').on('click', function () {
    console.log('test2');
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
        placeholder: "Начните вводить город",
        allowClear: true,
        language: {
            "noResults": function () {
                return "Результатов не найдено";
            },
            searching: function () {
                return "Поиск";
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        },
        ajax: {
            url: 'index.php?route=checkout/checkout/zones',
            data: function (params) {
                // Query parameters will be ?search=[term]&type=public
                return {
                    search: params.term
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data
                };
            },
        }
    });
}
if ($('.select2-postBranch').length) {
    $('.select2-postBranch').select2({
        placeholder: "Введите номер отделения или адрес",
        allowClear: true,
        language: {
            "noResults": function () {
                return "Результатов не найдено";
            },
            searching: function () {
                return "Поиск";
            }
        },
        escapeMarkup: function (markup) {
            return markup;
        },
        ajax: {
            url: 'index.php?route=checkout/checkout/zone',
            data: function (params) {
                // Query parameters will be ?search=[term]&type=public
                return {
                    search: params.term,
                    zone_id: $('#city_id').val()
                };
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                return {
                    results: data.map(function (dep) {
                        return {
                            id: dep.city_id,
                            text: dep.name
                        }
                    })
                };
            },
        }
    });
}

$('.form__radio-input').on('change', function () {
    $('.form__radioEl-body').removeClass('active');
    $(this).closest('.form__radioEl').siblings('.form__radioEl').removeClass('active');
    $(this).closest('.form__radioEl').addClass('active').find('.form__radioEl-body').addClass('active');
    $(this).closest('.checkout__el').find('.checkout__fields-next').prop('disabled', true);
});

$('#justin_delivery, #address_delivery, #ukrposhta_delivery').on('keyup', function () {
    if ($(this).val().length > 0) {
        $(this).closest('.checkout__el').find('.checkout__fields-next').prop('disabled', false);
    } else {
        $(this).closest('.checkout__el').find('.checkout__fields-next').prop('disabled', true);
    }
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
    $('#checkout__city').html('г. ' + $("#input-payment-zone option:selected").text());
    let paymentMethod = $('[name=deliveryMethod]:checked').val();

    let address = '';
    switch (paymentMethod) {
        case "NP":
            address = $(this).closest('.checkout__el').find('.form__radioEl.active .select2-postBranch').val();
            break;
        case "Justin":
            address = 'Отделение №' + $('#justin_delivery').val();
            break;
        case "address":
            address = $('#address_delivery').val();
            break;
        case "Ukrposhta":
            address = $('#ukrposhta_delivery').val();
            break;
    }

    $('#checkout__address').html(address);
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
        const can_be_deleted = $(this).closest('.el').attr('data-can_be_deleted');

        // додавання компонента в праву колонку
        $('.constructor__components .constructor__collapse-body').append(
            '<div' +
            ' class="constructor__components-el added_component" ' +
            ' data-id="' + id + '" ' +
            ' data-component_id="' + component_id + '" ' +
            ' data-price="' + price_ + '" ' +
            ' > ' +
            ' <span class="constructor__components-el-imgContainer"> ' +
            ' <img src="' + img + '" alt="' + name + '" class="constructor__components-el-img"> ' +
            ' </span> ' +
            ' <span class="constructor__components-el-body"> ' +
            ' <span class="constructor__components-el-name">' + name + '</span> ' +
            ' <span class="constructor__components-el-value">' + price + '</span> ' +
            ' </span>' +
            (can_be_deleted === '1' ? `<span class="constructor__components-el-remove"></span>` : '')
            + '</div>');

        // обрахунок нової ціни
        let total_price = 0;
        const total_span = $('.constructor__components-sum-value');
        const currency = total_span.text().substring(total_span.text().length - 1);
        $('.added_component').each(function (index) {
            total_price += parseInt($(this).attr('data-price'));
        })
        $('.constructor__components-sum-value').text(total_price + currency);
        $('.constructor__components-sum-value').attr('data-total', total_price);

        // додавання зображення компонента і стрілки біля тари
        $('.constructor__product-body').append(`
            <div class="constructor__product-el" data-id="${id}">
              <span class="constructor__product-el-imgContainer">
                <img src="${img}" alt="#" class="constructor__product-el-img">
              </span>
              <span class="constructor__product-el-name">${name}</span>
            </div>
         `);

        // заміна відео
        let video = $('#constructor__product-video');
        let ext = video.attr('data-ext');
        video.attr('src', video_src + '/' + (parseInt(amount) + 1) + '.' + ext);

        setTimeout(function () {
            $('.constructor__product-preloader').hide();
            $('.constructor__product').show();
        }, 500)
    }
});

$(document).on('click', '.constructor__components-el-remove', function () {
    const amount = $('.added_component').length;
    const video_src = $('#constructor__product-video').attr('data-video_url');

    $('.constructor__product').hide();
    $('.constructor__product-preloader').show();

    if ($('.constructor__menu .el.active').length == 1) {
        $('.constructor__product-body').removeClass('active');
    }
    for (let i = 0; i < $('.constructor__menu .el').length; i++) {
        if ($(this).closest('.constructor__components-el').data('id') == $('.constructor__menu .el').eq(i).attr('id')) {
            $('.constructor__menu .el').eq(i).removeClass('active');
        }
    }

    // видалення поряд з баночкою
    for (let i = 0; i < $('.constructor__product-el').length; i++) {
        if ($(this).closest('.constructor__components-el').data('id') == $('.constructor__product-el').eq(i).data('id')) {
            $('.constructor__product-el').eq(i).remove();
        }
    }

    $(this).closest('.constructor__components-el').remove();

    // обрахунок нової ціни
    let total_price = 0;
    const total_span = $('.constructor__components-sum-value');
    const currency = total_span.text().substring(total_span.text().length - 1);
    $('.added_component').each(function (index) {
        total_price += parseInt($(this).attr('data-price'));
    });

    $('.constructor__components-sum-value').text(total_price + currency);
    $('.constructor__components-sum-value').attr('data-total', total_price);

    // заміна відео
    let video = $('#constructor__product-video');
    let ext = video.attr('data-ext');
    video.attr('src', video_src + '/' + (parseInt(amount) + 1) + '.' + ext);

    setTimeout(function () {
        $('.constructor__product-preloader').hide();
        $('.constructor__product').show();
    }, 500)
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
    //отменяем стандартную обработку нажатия по ссылке
    event.preventDefault();

    //забираем идентификатор бока с атрибута href
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
    console.log('test');
    $(this).closest('.productCard').addClass('toRemove');
});

$('#modalShureRemove')
    .on('click', '.button--primary', function () {
        $('.productCard.toRemove').parent().remove();
    })
    .on('hidden.bs.modal', function (event) {
        $('.productCard.toRemove').removeClass('toRemove');
    });

$(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
});
// if($('.videoBG').length) {
//   document.getElementsByClassName('.videoBG').play();
// }

if ($('#checkout_page').length > 0) {
    $('#checkout_page select[name=\'zone_id\']').on('change', function () {
        $('#city_id').val($(this).val());
        // if (this.value == '') return;
        // $.ajax({
        //     url: 'index.php?route=checkout/checkout/zone&zone_id=' + this.value,
        //     dataType: 'json',
        //     beforeSend: function () {
        //         $('#checkout_page select[name=\'zone_id\']').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
        //     },
        //     complete: function () {
        //         $('.fa-spin').remove();
        //     },
        //     success: function (json) {
        //         $('.fa-spin').remove();
        //
        //         html = '<option value="">{{ text_select }}</option>';
        //
        //         if (json['city'] != '') {
        //             for (i = 0; i < json['city'].length; i++) {
        //                 html += '<option value="' + json['city'][i]['name'] + '"';
        //
        //                 if (json['city'][i]['name'] == '{{ city }}') {
        //                     html += ' selected="selected"';
        //                 }
        //
        //                 html += '>' + json['city'][i]['name'] + '</option>';
        //             }
        //         } else {
        //             html += '<option value="0" selected="selected">{{ text_none }}</option>';
        //         }
        //
        //         $('#checkout_page select[name=\'city\']').html(html);
        //     },
        //     error: function (xhr, ajaxOptions, thrownError) {
        //         alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        //     }
        // });
    });
    //
    // $('#checkout_page select[name=\'zone_id\']').trigger('change');

}

$('#checkout_page select[name=\'zone_id\']').on('change', function () {
    $('#city_id').val($(this).val());
    // if (this.value == '') return;
    // $.ajax({
    //     url: 'index.php?route=checkout/checkout/zone&zone_id=' + this.value,
    //     dataType: 'json',
    //     beforeSend: function () {
    //         $('#checkout_page select[name=\'zone_id\']').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
    //     },
    //     complete: function () {
    //         $('.fa-spin').remove();
    //     },
    //     success: function (json) {
    //         $('.fa-spin').remove();
    //
    //         html = '<option value="">{{ text_select }}</option>';
    //
    //         if (json['city'] != '') {
    //             for (i = 0; i < json['city'].length; i++) {
    //                 html += '<option value="' + json['city'][i]['name'] + '"';
    //
    //                 if (json['city'][i]['name'] == '{{ city }}') {
    //                     html += ' selected="selected"';
    //                 }
    //
    //                 html += '>' + json['city'][i]['name'] + '</option>';
    //             }
    //         } else {
    //             html += '<option value="0" selected="selected">{{ text_none }}</option>';
    //         }
    //
    //         $('#checkout_page select[name=\'city\']').html(html);
    //     },
    //     error: function (xhr, ajaxOptions, thrownError) {
    //         alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    //     }
    // });
});

$('#checkout_page .orderButton').on('click', function () {
    let form1 = $('#form1');
    let form2 = $('.stage2');
    let form3 = $('.stage3');
    let form4 = $('.checkout__feedback');
    let deliveryMethod = form2.find('[name=deliveryMethod]:checked').val();
    let paymentMethod = form3.find('[name=payMethod]:checked').val();
    console.log(form4.find('[name=no_call]').val());
    $.ajax({
        url: 'index.php?route=checkout/confirm/ajax',
        dataType: 'json',
        method: 'POST',
        data: {
            name: form1.find('[name=name]').val(),
            surname: form1.find('[name=surname]').val(),
            email: form1.find('[name=email]').val(),
            phone: form1.find('[name=phone]').val(),
            city_id: $('#city_id').val(),
            deliveryMethod: deliveryMethod,
            paymentMethod: paymentMethod,
            zone_id: $('#np_dep_id').val(),
            address: form2.find('.address_delivery').val(),
            comment: form4.find('[name=comment]').val(),
            no_call: form4.find('[name=no_call]').prop('checked') ? 1 : 0,
        },
        // beforeSend: function () {
        //     $('#checkout_page select[name=\'zone_id\']').after(' <i class="fa fa-circle-o-notch fa-spin"></i>');
        // },
        complete: function () {
            $('.fa-spin').remove();
        },
        success: function (json) {
            location.href = 'index.php?route=checkout/confirm'
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});

$('.free_checkout #button-confirm').on('click', function () {
    let button = $(this);
    $.ajax({
        type: 'get',
        url: 'index.php?route=extension/payment/free_checkout/confirm',
        cache: false,
        beforeSend: function () {
            $('#button-confirm').button('loading');
        },
        complete: function () {
            $('#button-confirm').button('reset');
        },
        success: function () {
            location.href = button.attr('data-continue');
        }
    });
});

$('.form__promocode-submit').on('click', function (e) {
    e.preventDefault();
    const button = $(this);
    const start_amount = parseInt(button.attr('data-amount'));
    const currency = button.attr('data-currency');
    $.ajax({
        type: 'get',
        url: 'index.php?route=api/voucher/check_code',
        data: 'voucher=' + $(this).closest('form').find('input').val(),
        method: 'POST',
        cache: false,
        beforeSend: function () {
            $('#button-confirm').button('loading');
        },
        complete: function () {
            $('#button-confirm').button('reset');
        },
        success: function (json) {
            $('.voucher_message').remove();
            if (json.status === 'success') {
                $('.voucher_value').text(json.amount + currency);
                let new_total = start_amount - parseInt(json.amount);
                new_total = new_total >= 0 ? new_total : 0;
                console.log(new_total);
                $('.total_span_final').text(new_total + currency);

                $('.form__promocode').after('<span class="voucher_message voucher_success color-secondary">' + json.message + '</span>')
            } else {
                $('.form__promocode').after('<span class="voucher_message voucher_error">' + json.message + '</span>')
            }
            // location.href = button.attr('data-continue');
        }
    });
});