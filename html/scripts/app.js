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
if($('input.number').length) {
  $('input.number').mask('00000');
}