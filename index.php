<!DOCTYPE html>
<html>
<head>
<?php 
include_once("partials/head.php");
?>
</head>
<body>
<?php
include_once("partials/header.php");

    $task = $_GET["task"];

    if($task == "tdv" && $_POST)
    {
        include_once("session.php");
        Session::start();
        if ($_SESSION['thong_tin_user'][0]->username)
        {
            include_once("controller/c_trang_dat_ve.php");
            $trang_dat_ve = new c_dat_ve();
            $trang_dat_ve->hien_thi_trang_dat_ve(); 
        }
        else
        {
            ?><script> alert('Bạn phải đăng nhập để được đặt vé'); </script><?php
            echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
        }
    }
    else if($task == "tct")
    {
        include_once("controller/c_chi_tiet.php");
        $trang_chi_tiet = new c_chi_tiet();
        $trang_chi_tiet->hien_thi_trang_chi_tiet();
    }
    else if($task == "pdc")
    {
        include_once("controller/c_trang_list_phim_dang_chieu.php");
        $trang_list_phim_sap_chieu = new c_list_phim_dang_chieu();
        $trang_list_phim_sap_chieu->hien_tri_list_phim_dang_chieu();
    }
    else if($task == "psc")
    {
        include_once("controller/c_trang_list_phim_sap_chieu.php");
        $trang_list_phim_sap_chieu = new c_list_phim_sap_chieu();
        $trang_list_phim_sap_chieu->hien_tri_list_phim_sap_chieu();
    }
    else if($task == 'bl')
    {
        include_once("controller/c_trang_list_binh_luan.php");
        $list_bat_viet = new c_list_bai_viet();
        $list_bat_viet->hien_thi_list_bai_viet();
    }
    else if($task == 'ctbl')
    {
        include_once("controller/c_trang_chi_tiet_binh_luan.php");
        $chi_tiet_bai_viet = new c_chi_tiet_bai_viet();
        $chi_tiet_bai_viet->hien_thi_chi_tiet_bai_viet();
    }
    else if($task == 'sk')
    {
        include_once("controller/c_trang_list_su_kien.php");
        $list_su_kien = new c_list_su_kien();
        $list_su_kien->hien_thi_list_su_kien();
    }
    else if($task == 'ctsk')
    {
        include_once("controller/c_trang_chi_tiet_su_kien.php");
        $chi_tiet_su_kien = new c_chi_tiet_su_kien();
        $chi_tiet_su_kien->hien_thi_chi_tiet_su_kien();
    }
    else if($task == 'tnd')
    {
        include_once("session.php");
        Session::start();
        if($_SESSION['thong_tin_user'][0]->username)
        {
            include_once("controller/c_trang_nguoi_dung.php");
            $trang_nguoi_dung = new c_nguoi_dung();
            $trang_nguoi_dung->hien_thi_trang_nguoi_dung(); 
        }
        else
        {
            include_once("controller/c_trang_chu.php");
            $trang_chu = new c_trang_chu();
            $trang_chu->hien_trang_chu();
        }
    }
    else
    {
        include_once("controller/c_trang_chu.php");
        $trang_chu = new c_trang_chu();
        $trang_chu->hien_trang_chu();  
    }


include_once("partials/footer.php");
?>
</body>