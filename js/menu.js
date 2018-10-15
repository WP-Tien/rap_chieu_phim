$(function() {
      // Xử lý res-menu bằng jq
        //Xét chiều rộng ban đầu của website
        $(window).width(function(){
          var rongbandau = $(window).width();
          //console.log(rongbandau);
          if(rongbandau < 991){
            $('#menu').removeClass('menu-toggle');
            $('#menu').addClass('menu-toggle-1');

            $('#lick-lc').removeClass('click-lich-chieu');
            $('.lich-chieu').hide();
          }
          else
          {
            $('#menu').removeClass('menu-toggle-1');
            $('#menu').addClass('menu-toggle');
            //mac dinh
            $('.click-lich-chieu').show();
            $('.lich-chieu').hide();
            $('.click-lich-chieu').click(function() {
              $('.lich-chieu').show();
              $('.click-lich-chieu').hide();

              return false;
            });
          }
        });

        //Xét chiều rộng khi resize website
        $(window).resize(function(){
            //console.log($(window).width());
            var rong = $(window).width();
            if(rong < 991){
              $('#menu').removeClass('menu-toggle');
              $('#menu').addClass('menu-toggle-1');

              $('#lick-lc').removeClass('click-lich-chieu');
              $('.lich-chieu').hide();
            }
            else
            {
              $('#menu').removeClass('menu-toggle-1');
              $('#menu').addClass('menu-toggle');
              //mac dinh
              $('.click-lich-chieu').show();
              $('.lich-chieu').hide();
              $('.click-lich-chieu').click(function() {
                $('.lich-chieu').show();
                $('.click-lich-chieu').hide();

                return false;
              });
            }
        });

    //Lịch chiếu




    // Toggle của menu
    $('#button-menu').click(function() {
      $('#menu').toggle("fast");
    });

    // Toggle của dang-nhap-dang-ki
    $('#button-dangnhap-dangki').click(function() {
      $('#dangnhap-dangki').toggle("fast");
      return false;
    });    
    
    // $(document).click(function(event) {
    //     if (!$(event.target).is("#button-dangnhap-dangki")) {
    //         $("#dangnhap-dangki").hide("slow");
    //     }
    // });



  // $(window).scroll(function() {
  //   // Lấy giá trị scroll top
  //   //console.log($(window).scrollTop())
  //   if($(window).scrollTop() > 200) {
  //     $(".header-star").addClass("header-star-sm");
  //     // $(".header-star").animate({
  //     //   fontSize: '50px',
  //     //   right: '430px'
  //     // });
  //   }
  //   if($(window).scrollTop() < 100) {
  //     $(".header-star").removeClass("header-star-sm");
  //     //alert("abc");
  //   }
  // });

});
