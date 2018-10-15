<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-color: #222; padding: 30px 0px 40px 0px; color:#fff; margin-top: 30px">
        <div class="container">
            <div class="container">
                <div class="container">
                <ul>
                    <li style="display:inline; padding: 2px 17px;">
                        <a title="Lịch chiếu" href="#">Lịch chiếu</a>
                    </li>
                    <li style="display:inline; padding: 2px 17px;">
                        <a title="Phim" href="#">Phim</a>
                    </li>
                    <li style="display:inline; padding: 2px 17px;">
                        <a title="Rạp/Giá vé" href="#">Rạp/Giá vé</a>
                    </li>
                    <li style="display:inline; padding: 2px 17px;">
                        <a title="Ưu đãi / Sự kiện" href="#">Ưu đãi / Sự kiện</a>
                    </li>
                    <li style="display:inline; padding: 2px 17px;">
                        <a class="hide-xs" title="Giải trí" href="#">Giải trí</a>
                    </li>
                    <li style="display:inline; padding: 2px 17px;">
                        <a title="SALE &amp; SERVICE" href="#">SALE &amp; SERVICE</a>
                    </li>
                    <li style="display:inline; padding: 2px 17px;">
                        <a title="Góc điện ảnh" href="#">Góc điện ảnh</a>
                    </li>
                    <li style="display:inline; padding: 2px 17px;">
                        <a title="Đăng nhập"href="#">Đăng nhập</a>
                    </li>
                    <li style="display:inline; padding: 2px 17px;">
                        <a title="Liên hệ" href="">Liên hệ</a>
                    </li>
                </ul>
                <div class="text-center">
                    <ul style="display: inline-block; list-style-type: none; font-size: 30px; padding: 20px 0 0 0; margin: 0; ">
                        <li style="display:inline; margin: 0 10px;">
                            <a href="#"><i class="fa fa-facebook-square" aria-hidden="true" style="color: white;"></i></a></li>
                        <li style="display:inline; margin: 0 10px;">
                            <a href="#"><i class="fa fa-youtube-play" aria-hidden="true" style="color: white;"></i></a>
                        </li>
                        <li style="display:inline; margin: 0 10px;">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true" style="color: white;"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>

<div class="fbchatbox hidden-xs" style="position:fixed;right:10px;bottom:0;z-index:9999">
    <div class="fb-page" data-href="https://www.facebook.com/Englishnht/" data-small-header="true" data-adapt-container-width="false" data-height="300" data-width="300" data-hide-cover="true" data-show-facepile="true" data-show-posts="false" data-tabs="messages"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Englishnht/"><a href="https://www.facebook.com/Englishnht/">https://www.facebook.com/Englishnht/</a></blockquote></div></div>
    <span class="hide" id="closefbchat" style="right:0px;white-space: nowrap;position:absolute;bottom:299px;width:300px;padding:7px; background: #fcb040;color: #fff;cursor: pointer;">Tắt Hỗ Trợ</span>
</div>







<script type="text/javascript" src="vendor/js/jquery-3.2.1.js" ></script>
<script type="text/javascript" src="vendor/bootstrap-3.3.6/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="vendor/slick/slick.min.js" ></script>
<script type="text/javascript" src="vendor/js/jquery_datatable.js" ></script>

<script type="text/javascript" src="js/menu.js" ></script>
<script type="text/javascript" src="js/binh-luan.js" ></script>
<script type="text/javascript" src="js/lich-chieu.js" ></script>
<script type="text/javascript" src="js/chi-tiet-bl.js" ></script>
<script type="text/javascript" src="js/su-kien.js" ></script>

<!-- Ajax use jquery -->
<script type="text/javascript" src="js/a_phim_dang_chieu_sap_chieu.js"></script>
<script type="text/javascript" src="js/a_menu_xet_dang_nhap.js"></script>
<script type="text/javascript" src="js/a_dat_ve.js"></script>
<script type="text/javascript">
    $(function() {
    $('.lich-chieu a').click(function() {
      var page = this.hash.substr(1);
      
      $.get(page+".php", function(html){
        $('.theophim-theorap-theongay').show(); 
        $('.theophim-theorap-theongay').html(html); 
      });
   
      return false;
    });
  });

</script>

<script>
    $(function() {
        $('.dang-ki-thanh-vien').click(function() {
           $('#dang_ki').show();
           document.body.style.overflow = 'hidden';
        });

        $('.btn-close-dk').click(function() {
            $('#dang_ki').hide();
            document.body.style.overflow = 'scroll';
        });

    });

    $(function() {
    // Menu xet dang nhap
    $('.btn-dang-ki').click(function() {
        $.ajax({
            url: "kiem_tra_dang_ki.php",
            method: "POST",
            data: {tai_khoan: $('#tai_khoan').val(), mat_khau: $('#mat_khau').val(), mat_khau_2: $('#mat_khau_2').val(), ho_ten: $('#ho_ten').val(), email: $('#email').val()},
            success: function(data){
                // $("#tai_khoan").val('');
                // $("#tai_khoan").focus();
                // $("#tai_khoan").attr('placeholder',data);
                alert(data);
                if (data == 'Chúc mừng bạn đăng kí thành công !')
                {
                    $('#dang_ki').hide();
                    document.body.style.overflow = 'scroll';
                }

            }
        });
        });

    });
</script>

<!-- Dat ve scroll  -->
<script>
    $(function() {
        $('#nut-dat-ve').click(function() {
            //var viTri = $('#lich-chieu').offset();
            //alert(viTri.top);
            $('html, body').animate({
                scrollTop: $("#lich-chieu").offset().top
            }, 1000);
        });
    });
    
</script>


<!-- Data-table -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#my_Table').DataTable({
            "language": {
                "sSearch": "Tìm kiếm:",
                "sEmptyTable":    "Hiện không có dữ liệu",
                "sInfo":           "Hiện _START_ đến _END_ trong tổng _TOTAL_ vé",
                "sLengthMenu":     "Hiện _MENU_ vé",
                    "oPaginate": {
                        "sFirst":    "Đầu tiên",
                        "sLast":     "Cuối cùng",
                        "sNext":     "Tiếp",
                        "sPrevious": "Trước"
                    },
                
            }
        });
    });
</script>

<!-- Huy ve nguoi dung -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#my_Table #huy_ve_nguoi_dung').click(function() {

        var hi = confirm("Bạn thật sự muốn hủy phim, hủy phim hoàn tiền 30%");
        
        if(hi == true)
        {
            $.post("xu_ly_dat_ve_phim.php?task=xu_ly_huy_ve_nguoi_dung", {id_ve: $(this).attr("data-idve")}).success(function(data){
                    //console.log(data);

                    alert('Bạn gửi yêu cầu thành công !');

                    window.location.href = 'index.php?task=tnd';
            });
        }
        else
        {
            alert('Chúc bạn xem phim vui vẻ !');
        }
        });;
    });
</script>


<!-- <script type="text/javascript">

    $(function() {
        $("#chon-loai").change(function() {
            //alert($('#chon-loai').val());

            $.ajax({
                url: "xu_ly_dat_ve_phim.php?task=ds_phim_theo_loai",
                type: "POST",
                data: { id_loai_phim: $('#chon-loai').val() },
                success: function(data){
                    
                    console.log(data);
                }


            });
        });

    });

</script> -->



<!-- 
<script src= "https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
 -->
<script>
    if (localStorage.getItem("fbchatclose") == 1) {

        $('.fb-page').toggleClass('hide');

        $('#closefbchat').html('<i class="fa fa-comments fa-2x"></i> Hỗ Trợ Khách Hàng').css({ 'bottom': 0 });
    }

    setTimeout(function () {
        $("#closefbchat").removeClass("hide");
    }, 1000);


    $('#closefbchat').click(function () {
        $('.fb-page').toggleClass('hide');
        if ($('.fb-page').hasClass('hide')) {
            localStorage.setItem("fbchatclose", 1);
           
            $('#closefbchat').html('<i class="fa fa-comments fa-2x"></i> Hỗ Trợ Khách Hàng').css({ 'bottom': 0 });
        }
        else {
            localStorage.setItem("fbchatclose", 0);
            $('#closefbchat').text('Tắt Hỗ Trợ').css({ 'bottom': 299 });
        }
    });
</script>