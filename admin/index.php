<?php
include_once("../session.php");
Session::start();
include_once("../model/model_quan_tri.php");
$model_quan_tri = new xl_nguoi_dung();

$task = $_GET["task"];
if ($_POST){
if($_POST["ten_dang_nhap"])
{
$thong_tin_user = $model_quan_tri->lay_thong_tin_quan_tri($_POST["ten_dang_nhap"]);
//print_r($thong_tin_user);

// kiểm tra thông tin

if($thong_tin_user->password == md5($_POST["mat_khau"]))
{
    //$_SESSION["nguoi_dung"] = $thong_tin_user;
    Session::set('thong_tin_user',array($thong_tin_user));
    //Session::display();
    
    // echo "<script>alert('Đăng nhập thành công!')</script>";
    echo "<script>window.location = 'index.php'  </script>";
}
else
{
    echo "<script>alert('Tài khoản hoặc mật khẩu không đúng!')</script>";
}
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - Dark Admin</title>

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/local.css" />
<link rel="stylesheet" type="text/css" href="css/jquery_datatable.css" />

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery_datatable.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
<link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
<script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>



</head>
<?php
Session::start();
if($_SESSION['thong_tin_user'][0]->authorization <> 0 || !$_SESSION["thong_tin_user"]){
?>
<form action="" method="post">
<div class="col-xs-4 col-xs-offset-4">
        <form action="" method="POST" role="form">
            <legend style="color:black;">ĐĂNG NHẬP</legend>

            <div class="form-group">
                <label for="">Tài khoản</label>
                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="ten_dang_nhap" />

                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" placeholder="Tên đăng nhập" name="mat_khau" />
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
</form>
<?php
}
else if($task == "logout")
{
Session::destroy();
header("location: index.php");
}
else
{
?>
<body>
<div id="wrapper">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <?php 
    include_once("../model/model_rap_phim.php"); 
    $thong_tin_rap = new xl_rap_phim();

    if ($_SESSION['thong_tin_user'][0]->quan_tri_rap > 0)
    {
        $id_rap = $_SESSION['thong_tin_user'][0]->quan_tri_rap;
        $rap_phim = $thong_tin_rap->lay_rap_theo_id_rap($id_rap);
        //print_r($rap_phim);
    }
    include_once("widgets/logo.php") ?>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul id="active" class="nav navbar-nav side-nav">
            <?php
                if($_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
                {
            ?>
            <li><a class="dropdown" href="index.php?task=danh_sach_admin"><i class="fa fa-list"></i> Quản trị admin *</a>
                <ul class="dropdown">
                    <li><a href="index.php?task=them_quan_tri" style="color:#BDBDBD"><i class="fa fa-plus-circle"></i> Thêm quản trị *</a></li>
                </ul>
            </li> 
            <li><a class="dropdown" href="index.php?task=danh_sach_rap_phim"><i class="fa fa-list"></i> Quản lý rạp chiếu *</a>
                <ul class="dropdown">
                    <li><a href="index.php?task=them_rap" style="color:#BDBDBD"><i class="fa fa-plus-circle"></i> Thêm rạp *</a></li>
                </ul>
            </li>                    
            <li><a class="dropdown" href="index.php?task=danh_sach_phong_chieu"><i class="fa fa-list"></i> Quản phòng chiếu *</a>
                <ul class="dropdown">
                    <li><a href="index.php?task=them_phong" style="color:#BDBDBD"><i class="fa fa-plus-circle"></i> Thêm phòng *</a></li>
                </ul>
            </li>
            <li><a class="dropdown" href="index.php"><i class="fa fa-list"></i> Quản lý phim</a>
                <ul class="dropdown">
                    <li><a href="#" style="color:#BDBDBD"> Thêm phim </a></li>
                </ul>
            </li>  
            <?php
            }
            ?>                     

            <li><a class="dropdown" href="index.php?task=nhan_ve_tai_rap"><i class="fa fa-bullseye"></i> Nhận vé tại rạp </a>
                <ul class="dropdown">
                    <li><a href="index.php?task=danh_sach_ve_phim" style="color:#BDBDBD"> Hủy vé người dùng </a></li>
                    <li><a href="index.php?task=doi_phan_thuong_khach" style="color:#BDBDBD"> Đổi phần thưởng </a></li>
                </ul>
            </li>      

            <li><a class="dropdown" href="index.php?task=danh_sach_lich_chieu"><i class="fa fa-bullseye"></i> Quản lý lịch chiếu</a>
                <ul class="dropdown">
                    <li><a href="index.php?task=them_lich_chieu" style="color:#BDBDBD"> Thêm lịch chiếu </a></li>
                </ul>
            </li>                    
        </ul>
        <?php include_once("widgets/header.php") ?>
    </div>
</nav>
<div id="page-wrapper">
    <?php
    if($task == "danh_sach_ve_phim")
    {
       include_once("pages/trang_danh_sach_ve_phim.php");
       $trang_danh_sach_ve_phim = new c_danh_sach_ve_phim();
       $trang_danh_sach_ve_phim->hien_thi_trang_danh_sach_ve_phim();
    }
    else if($task == "xu_ly_ve")
    {     
        include_once("pages/trang_danh_sach_ve_phim.php");
        $trang_danh_sach_ve_phim = new c_danh_sach_ve_phim();
        $trang_danh_sach_ve_phim->xoa_ve_phim_nguoi_dung();
    }
    else if($task == "nhan_ve_tai_rap")
    {
        include_once("pages/trang_danh_sach_ve_phim.php");
        $trang_danh_sach_ve_phim = new c_danh_sach_ve_phim();
        $trang_danh_sach_ve_phim->nhan_ve_tai_rap();
    }
    else if($task == "doi_phan_thuong_khach")
    {
        include_once("pages/trang_doi_phan_thuong.php");
        $trang_doi_phan_thuong = new c_doi_phan_thuong();
        $trang_doi_phan_thuong->hien_thi_trang_doi_phan_thuong();
    }
    else if($task == "xy_ly_phan_thuong")
    {
        include_once("pages/trang_doi_phan_thuong.php");
        $trang_doi_phan_thuong = new c_doi_phan_thuong();
        $trang_doi_phan_thuong->xu_ly_doi_phan_thuong();
    }
    else if($task == "danh_sach_admin" && $_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
    {
        include_once("pages/trang_danh_sach_admin.php");
        $trang_quan_tri_admin   = new c_quan_tri_admin();
        $trang_quan_tri_admin->hien_tri_danh_sach_quan_tri();
    }
    else if($task == "xy_ly_admin" && $_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
    {
        include_once("pages/trang_danh_sach_admin.php");
        $trang_quan_tri_admin   = new c_quan_tri_admin();
        $trang_quan_tri_admin->xu_ly_admin();
    }
    else if($task == "them_quan_tri" && $_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
    {
        include_once("pages/trang_danh_sach_admin.php");
        $trang_quan_tri_admin   = new c_quan_tri_admin();
        $trang_quan_tri_admin->hien_thi_them_quan_tri();
    }
    else if($task == "danh_sach_lich_chieu")
    {
        include_once("pages/trang_danh_sach_lich_chieu.php");
        $trang_danh_sach_lich_chieu = new c_lich_chieu();
        $trang_danh_sach_lich_chieu->hien_thi_danh_sach_lich_chieu();
    }
    else if($task == "them_lich_chieu")
    {
        $id_rap = $_SESSION['thong_tin_user'][0]->quan_tri_rap;
        include_once("pages/trang_danh_sach_lich_chieu.php");
        $trang_danh_sach_lich_chieu = new c_lich_chieu();
        $trang_danh_sach_lich_chieu->them_lich_chieu($id_rap);
    }
    else if($task == "xu_ly_lich_chieu")
    {
        include_once("pages/trang_danh_sach_lich_chieu.php");
        $trang_danh_sach_lich_chieu = new c_lich_chieu();
        $trang_danh_sach_lich_chieu->huy_lich_chieu();
    }    

    else if($task == "danh_sach_rap_phim" && $_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
    {
        include_once("pages/trang_danh_sach_rap_chieu.php");
        $hien_thi_trang_rap_chieu = new c_quan_tri_rap();
        $hien_thi_trang_rap_chieu->hien_thi_trang_rap_chieu();
    }
    else if($task == "xu_ly_rap" && $_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
    {
        include_once("pages/trang_danh_sach_rap_chieu.php");
        $xu_ly_rap = new c_quan_tri_rap();
        $xu_ly_rap->xu_ly_rap();
    }    
    else if($task == "them_rap" && $_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
    {
        include_once("pages/trang_danh_sach_rap_chieu.php");
        $them_rap = new c_quan_tri_rap();
        $them_rap->them_rap();
    }

    else if($task == "danh_sach_rap_phim" && $_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
    {
        include_once("pages/trang_danh_sach_rap_chieu.php");
        $hien_thi_trang_rap_chieu = new c_quan_tri_rap();
        $hien_thi_trang_rap_chieu->hien_thi_trang_rap_chieu();
    }
    else if($task == "danh_sach_phong_chieu"  && $_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
    {
        include_once("pages/trang_phong_chieu.php");
        $hien_tri_danh_sach_phong_chieu = new c_phong_chieu();
        $hien_tri_danh_sach_phong_chieu->hien_tri_danh_sach_phong_chieu();
    }   
    else if($task == "xu_ly_phong"  && $_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
    {
        include_once("pages/trang_phong_chieu.php");
        $xu_ly_phong = new c_phong_chieu();
        $xu_ly_phong->xu_ly_phong();
    }    

    else if($task == "them_phong"  && $_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
    {
        include_once("pages/trang_phong_chieu.php");
        $them_phong = new c_phong_chieu();
        $them_phong->them_phong();
    }
    else 
    {
        include_once("index.php");
    }
    ?>
</div>
</div>
<!-- /#wrapper -->
</body>
<?php
}
?>
</html>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>