import 'slick-carousel'

jQuery(document).ready(function($) {

  //QUality standarts
  $('.standarts-slider').slick({
    infinite: true,
    slidesToShow: 6,
    rows: 0,
    speed: 500,
    prevArrow: $('.standarts--left'),
    nextArrow: $('.standarts--right'),
    responsive: [
      {
        breakpoint: 1025,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 2,
        }
      },
    ]
  })

  //Beginings of Valentis
  $('.inner-section__wrapper___item---begining_img').slick({
    infinite: false,
    slidesToShow: 1,
    rows: 0,
    fade: true,
    cssEase: 'linear',
    speed: 400,
    prevArrow: $('.begining--left'),
    nextArrow: $('.begining--right'),
  })

  // Activities
  $('.slider-activities__image').slick({
    slidesToShow: 1,
    fade: true,
    rows: 0,
    speed: 400,
    asNavFor: '.slider-activities',
    prevArrow: $('.activities--left'),
    nextArrow: $('.activities--right'),
  });
  $('.slider-activities').slick({
    slidesToShow: 1,
    fade: true,
    rows: 0,
    speed: 400,
    asNavFor: '.slider-activities__image',
    prevArrow: $('.activities--left'),
    nextArrow: $('.activities--right'),
  });

});