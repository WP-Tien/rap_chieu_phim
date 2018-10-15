$(function() {
     $('.cac-san-pham ul').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      // dots: true,
      // adaptiveHeight: false,
      arrows:true,
      autoplay: false,
      autoplaySpeed: 3000,
      responsive: [
      {
        breakpoint: 1000,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 580,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 400,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
    }); 

});
   
 