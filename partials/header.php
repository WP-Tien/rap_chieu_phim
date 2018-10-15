<nav class="navbar navbar-inverse">
    <div class="container">
        <div id="button-menu" class="navbar-header" style="padding: 10px 30px 10px 30px; cursor: pointer;background-color: #2d2d2d">
            <div><i class="fa fa-bars" aria-hidden="true" style="font-size: 60px; color: #fcb040; margin-top: 5px;"></i></div>
            <div style="color: white; font-weight: bold; font-size: 17px">MENU</div>
        </div>
        <div class="wrap-menu">
            <ul id="menu" class="menu-toggle">
                <a id="click-lc" class="click-lich-chieu" href="#trang-lich-chieu.php">
                    <li>LỊCH CHIẾU</li>
                </a>   
                <div class="lich-chieu">             
                    <a href="#chonphim_chonrap_chonsuat"><li>THEO PHIM | </li></a>                
                    <a href="#chonrap_chonphim_chonsuat"><li>THEO RẠP | </li></a>                
                    <a href="#chonngay_chonrap_chonsuat"><li>THEO NGÀY</li></a>  
                </div>
                <div class="theophim-theorap-theongay">
                    
                </div>
                <a href="index.php?task=psc">
                    <li>PHIM SẮP CHIẾU</li>
                </a>
                <a href="index.php?task=pdc">
                    <li>PHIM ĐANG CHIẾU</li>
                </a>
                <a href="index.php?task=sk">
                    <li>SỰ KIỆN</li>
                </a>
                <a href="index.php?task=bl">
                    <li>BÌNH LUẬN</li>
                </a>

            </ul>   
        </div>




        <ul class="nav navbar-nav navbar-left">
            <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

            <?php
            include_once("session.php");
            Session::start();
            //Session::display();
            if($_SESSION && $_SESSION['thong_tin_user'][0]->username )
            {
            ?>
            <li style="float:right;"><a href="index.php?task=tnd" id="ten-dang-nhap" class="nht-star-member" ><span>Xin Chào </span> <?php echo $_SESSION['thong_tin_user'][0]->ho_ten;  ?>  </a><a href="dang_xuat.php" style="float:right;">Thoát</a></li>
            <?php
            }
            else 
            {
            ?>
            <li><a href="index.php?task=tnd" id="ten-dang-nhap" class="nht-star-member" ><span>NHT STAR </span>MEMBER</a></li>
            <li><i id="button-dangnhap-dangki" class="fa fa-chevron-down mui-ten-xuong" aria-hidden="true"></i>
                <div class="wrap-dn-dk">
                    <div id="dangnhap-dangki" class="dn-dk-toggle">
                    <!-- <form action="dang_nhap.php" method="post"> -->
                    <input type="text" id="username" placeholder="Tài khoản" name="username">
                    <input type="password" id="password" placeholder="Mật khẩu" name="password">
                    <div style="width: 100%; margin-top: 10px;">
                        <input type="submit" class="btn btn-primary btn-dang-nhap inp--submit" value="ĐĂNG NHẬP" /> <a href="" class="quen-mat-khau"><u>Quên mật khẩu?</u></a>
                    </div>
                    <!-- </form> -->
                    <div style="clear:both;"></div>
                    <a class="dang-ki-thanh-vien">ĐĂNG KÝ THÀNH VIÊN</a>
                    </div>
                </div>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>

<?php
    include_once("model/model_quan_tri.php");
    $xl_dang_ky = new xl_nguoi_dung();


?>

<div id="dang_ki" style="position: fixed; top: 0; left: 0; background: rgba(0,0,0,0.95); width: 100%; height: 100%; z-index: 1032; display: none" >
    <form class="dang_ki">
        <div style="text-align: center; margin: 50px auto; color:#fcb040; font-weight: bold; font-size: 40px; background-color: #333; padding-top: 5px">ĐĂNG KÍ MỚI    
        </div>
        <div class="clear-both" style="clear: both;"></div>
        <div class="col-xs-3 col-xs-offset-2">TÀI KHOẢN (*) </div>
        <div class="col-xs-5"><input type="text" id="tai_khoan" class="form-control" placeholder="Bắt buộc *" /></div>
        <div class="clear-both" style="clear: both;" ></div>

        <div class="col-xs-3 col-xs-offset-2">MẬT KHẨU (*)</div>
        <div class="col-xs-5"><input type="password" id="mat_khau" class="form-control"/></div>
        <div class="clear-both" style="clear: both;"></div>

        <div class="col-xs-3 col-xs-offset-2">NHẬP LẠI MẬT KHẨU (*): </div>
        <div class="col-xs-5"><input type="password" id="mat_khau_2" class="form-control" "></div>
        <div class="clear-both" style="clear: both;"></div>

        <div class="col-xs-3 col-xs-offset-2">HỌ VÀ TÊN (*):</div>
        <div class="col-xs-5"><input type="text" id="ho_ten" class="form-control" placeholder="Bắt buộc *" ></div>
        <div class="clear-both" style="clear: both;"></div>

        <div class="col-xs-3 col-xs-offset-2">EMAIL (*): </div>
        <div class="col-xs-5"><input type="text" id="email" class="form-control" placeholder="Bắt buộc"/></div>
        <div class="clear-both" style="clear: both;"></div>

        <div class="col-xs-3 col-xs-offset-2"></div>
        <div class="col-xs-5">          
            <div class="btn btn-primary btn-dang-ki" style="width: 100%; height: 60px; padding: 20px; font-weight: bold; margin-top: 20px; font-size: 15px;" > ĐĂNG KÍ 
                <span class="glyphicon glyphicon-credit-card"></span> </div>
        </div>

        <div class="btn btn-danger btn-close-dk">
            <span class="glyphicon glyphicon-remove" style="font-size: 40px;"></span>
        </div>
   </form>
</div>
