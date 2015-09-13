$(function() {
  // $('.testimonial-slider').flickity({
  //   // options
  //   cellAlign: 'left',
  //   pageDots: false,
  //   wrapAround: true,
  //   autoPlay: 5000
  // });
  
  $('.testimonial-slider').slick({
    fade: true
  });
  $('.js-clients-list').slick({
    dots: false,
    slidesToShow: 5,
    slidesToScroll: 5,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
      },
      {
        breakpoint: 640,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
});