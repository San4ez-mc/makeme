/*jslint browser, es6 */
/*global window */

window.onload = function () {
  if($(window).width() > 991) {
    $('.constructor__menu-list .el__imgContainer').addClass('el__add');
  }
  $(window).on('resize', function(){
    if($(window).width() > 991) {
      $('.constructor__menu-list .el__imgContainer').addClass('el__add');
    } else {
      $('.constructor__menu-list .el__imgContainer').removeClass('el__add');
    }
  });
  $(window).on('scroll', function() {
    if($('.parallaxBalls').length) {
      if($('.parallaxBalls').offset().top < $(window).scrollTop() + $(window).height()) {
        $('.parallaxBalls').addClass('active');
        $('.parallaxBalls').css({
        'top' : $(window).scrollTop()/4
        });
      }
    }
  });
  $('.ticker').trigger('next.owl.carousel', [3000]);
  if($('.carousel-3els').length) {
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
          nav:false,
          margin: 20
        },
        991: {
          items: 3,
          nav:true,
          margin: 20
        },
        1199: {
          items: 3,
          nav:true,
          margin: 40
        },
      }
    });
  }
  if($('.carousel-4els').length) {
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
          nav:false,
          margin: 20
        },
        991: {
          items: 3,
          nav:true,
          margin: 20
        },
        1199: {
          items: 4,
          nav:true,
          margin: 24
        },
      }
    });
  }
};
$('.productFilters--toggle').on('click', function() {
  $('.productFilters, .productFilters__bg').toggleClass('active');
  $('body').toggleClass('overflow-hidden');
});
$('.dropdown-item').on('click', function() {
  $(this).siblings().removeClass('active');
  $(this).addClass('active');
  $(this).closest('.dropdown').find('.dropdown__value').html($(this).text());
});
if($('#timer').length) {
  $('#timer').countdown('2021/12/30', function(event) {
    $(this).html(event.strftime(`
<div class="timer__body">
  <div class="timer__body-el">
    <div class="timer__body-el-value">%d</div>
    <div class="timer__body-el-type">дни</div>
  </div>
  <span class="timer__body-el-dots">:</span>
  <div class="timer__body-el">
    <div class="timer__body-el-value">%H</div>
    <div class="timer__body-el-type">часы</div>
  </div>
  <span class="timer__body-el-dots">:</span>
  <div class="timer__body-el">
    <div class="timer__body-el-value">%M</div>
    <div class="timer__body-el-type">минуты</div>
  </div>
  <span class="timer__body-el-dots">:</span>
  <div class="timer__body-el timer__body-el--primary">
    <div class="timer__body-el-value">%S</div>
    <div class="timer__body-el-type">секунды</div>
  </div>
</div>
    `));
  });
}
$('.menuMobileToggle--js').on('click', function() {
  $('.menuMobile').toggleClass('active');
});

if($('.ticker').length) {
  $('.ticker').owlCarousel({
    dots: false,
    nav:false,
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

if($('input.number').length) {
  $('input.number').mask('00000');
}
if($('.quantityEl__input').length) {
  $('.quantityEl__input').mask('000');
}
if($('input[type="tel"]').length) {
  $('input[type="tel"]').mask('+38 000 000 00 00');
}
if($('input.birthday').length) {
  $('input.birthday').mask('00.00.0000');
}
function ValidateEmail(inputText) {
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if(inputText.value.match(mailformat))
  {
    $('#modalChangeEmailSuccess').modal('show');
  }
  else
  {
    $('#modalChangeError').modal('show');
  }
}


$('.form__field-passwordShow').on('click', function() {
  $(this).toggleClass('active');
  if($(this).siblings('.form__field-input--password').attr('type') == 'password') {
    $(this).siblings('.form__field-input--password').prop('type', 'text');
  } else {
    $(this).siblings('.form__field-input--password').prop('type', 'password');
  }
});

$('.productCard__remove').on('click', function() {
  $('#modalShureRemove').modal('show');
});


$('.quantityEl__plus').click(function () {
  if ($(this).prev().val() < 1000) {
    $(this).prev().val(+$(this).prev().val() + 1);
  }
});
$('.quantityEl__minus').click(function () {
  if ($(this).next().val() > 1) {
    if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
  }
});

$('.form__promocode input').on('keyup', function(){
  if($(this).val().length > 0) {
    $(this).closest('.form__promocode').find('.button').prop('disabled', null);
    
  } else {
    $(this).closest('.form__promocode').find('.button').prop('disabled', true);
  }
});
if($('.select2-city').length) {
  $('.select2-city').select2({
    placeholder: "Начните вводить город",
    allowClear: true
  });
}
if($('.select2-postBranch').length) {
  $('.select2-postBranch').select2({
    placeholder: "Введите номер отделения или адрес",
    allowClear: true
  });
}

$('.form__radio-input').on('change', function() {
  $('.form__radioEl-body').removeClass('active');
  $(this).closest('.form__radioEl').siblings('.form__radioEl').removeClass('active');
  $(this).closest('.form__radioEl').addClass('active').find('.form__radioEl-body').addClass('active');
  $(this).closest('.checkout__el').find('.checkout__fields-next').prop('disabled', true);
});

$('.checkout__fields-next').on('click', function(){
  $(this).closest('.checkout__el').addClass('filled');
  $(this).closest('.checkout__el').next('.checkout__el').removeClass('empty');
  if($('.checkout__el.filled').length == 2) {
    $('.orderButton').prop('disabled', null);
  }
});
$('.stage1 .checkout__fields-next').on('click', function() {
  $('#checkout__name').text($('#checkout__nameInput').val());
  $('#checkout__surname').text($('#checkout__surnameInput').val());
  $('#checkout__tel').text($('#checkout__telInput').val());
  $('#checkout__email').text($('#checkout__emailInput').val());
});
$('.stage2 .checkout__fields-next').on('click', function() {
  $('#checkout__postBranch').html($(this).closest('.checkout__el').find('.form__radioEl.active .form__radio-body-text').text());
  $('#checkout__city').html($('.select2-city').val());
  $('#checkout__postBranchAddress').html($(this).closest('.checkout__el').find('.form__radioEl.active .select2-postBranch').val());
});
$('.checkout__edit').on('click', function(){
  $(this).closest('.checkout__el').removeClass('filled');
  $('.orderButton').prop('disabled', true);
});


$('.stage1 input').on('keyup', function(){
  let k = 0;
  for(let i = 0; i < $('.stage1 input').length; i++) {
    
    if($('.stage1 input').eq(i).val()) {
      k++;
    }
    if(k == $('.stage1 input').length) {
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

$('.select2-city').on('select2:select', function() {
  $(this).closest('.checkout__fields').find('.form__radios').addClass('active');
});

$('.stage2 .select2-city').on('select2:clear', function() {
  $(this).closest('.checkout__fields').find('.form__radios').removeClass('active');
  $('.select2-postBranch').val(null).trigger('change');
  // $('.orderButton').prop('disabled', true);
});

$('.select2-postBranch').on('select2:select', function() {
  $(this).closest('.checkout__fields').find('.checkout__fields-next').prop('disabled', null);
  // if($('.checkout__el.filled').length == 1) {
  //   $('.orderButton').prop('disabled', null);
  // }
});

$('.select2-postBranch').on('select2:clear', function() {
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

$('input[name="deliveryMethod"]').on('change', function(){
  $('.select2-postBranch').val(null).trigger('change');
  // $(this).closest('.checkout__fields').find('.checkout__fields-next').prop('disabled', true);
});


$('.constructorTabs__el').on('click', function(){
  const el = $(this);
  if(el.closest('.tab-pane').next('.tab-pane').length) {
    el.closest('.tab-pane').removeClass('show active').next('.tab-pane').addClass('active show');
    $('.constructorTabs__nav-el').eq(el.closest('.tab-pane').index()).removeClass('active');
    $('.constructorTabs__nav-el').eq(el.closest('.tab-pane').index() + 1).attr('data-toggle', 'tab').addClass('active');

  }
});

$('.constructor__menu-list').on('click', '.el__add', function(){
  if($('.constructor__menu .el.active').length < 4) {
    $('.constructor__product-body').addClass('active');
    $(this).closest('.el').addClass('active');
    const id = $(this).closest('.el').attr('id');
    const img = $(this).closest('.el').find('.el__img').attr('src');
    const name = $(this).closest('.el').find('.el__title').text();
    const price = $(this).closest('.el').find('.el__tooltip-footer-price').text();
    $('.constructor__components .constructor__collapse-body').append(`
    <div class="constructor__components-el" data-id="${id}">
      <span class="constructor__components-el-imgContainer">
        <img src="${img}" alt="#" class="constructor__components-el-img">
      </span>
      <span class="constructor__components-el-body">
        <span class="constructor__components-el-name">${name}</span>
        <span class="constructor__components-el-value">${price}</span>
      </span>
      <span class="constructor__components-el-remove"></span>
    </div>
    `);

    $('.constructor__product-body').append(`
    <div class="constructor__product-el" data-id="${id}">
      <span class="constructor__product-el-imgContainer">
        <img src="${img}" alt="#" class="constructor__product-el-img">
      </span>
      <span class="constructor__product-el-name">${name}</span>
    </div>
    `);
  }
});

$('.constructor__components').on('click', '.constructor__components-el-remove', function(){ 
  if($('.constructor__menu .el.active').length == 1) {
    $('.constructor__product-body').removeClass('active');
  }
  for(let i = 0; i < $('.constructor__menu .el').length; i++) {
    if($(this).closest('.constructor__components-el').data('id') == $('.constructor__menu .el').eq(i).attr('id')) {
      $('.constructor__menu .el').eq(i).removeClass('active');
    }
  }
  for(let i = 0; i < $('.constructor__product-el').length; i++) {
    if($(this).closest('.constructor__components-el').data('id') == $('.constructor__product-el').eq(i).data('id')) {
      $('.constructor__product-el').eq(i).remove();
    }
  }
  $(this).closest('.constructor__components-el').remove();
});