/*jslint browser, es6 */
/*global window */

window.onload = function () {
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
if($('.carousel-3els').length) {
  $('.carousel-3els').owlCarousel({
    dots: true,
    
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
})