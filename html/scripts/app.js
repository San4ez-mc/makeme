/*jslint browser, es6 */
/*global window */

window.onload = function () {
  
};


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