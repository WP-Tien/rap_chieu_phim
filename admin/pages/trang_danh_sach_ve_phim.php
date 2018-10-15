<?php
	include_once("../model/model_ve.php");
	include_once("../model/model_phim.php");
	include_once("../model/model_ghe.php");
	include_once("../session.php");

	class c_danh_sach_ve_phim{
       	public $model_phim;
       	public $model_ve_phim;
       	public $model_ghe_phim; 

        function __construct()
        {
        	$this->model_phim = new xl_phim();
        	$this->model_ve_phim = new xl_ve();
        	$this->model_ghe_phim = new xl_ghe();
        }

        function hien_thi_trang_danh_sach_ve_phim()
        {
        	Session::start();
        	//Session::display();
	    	if($_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
            {
				// echo "Xử lý admin";
				$danh_sach_ve_phim_nguoi_dung_muon_huy = $this->model_ve_phim->thong_tin_ve_nguoi_dung_muon_huy();
            }
            else
            {
				$danh_sach_ve_phim_nguoi_dung_muon_huy = $this->model_ve_phim->thong_tin_ve_nguoi_dung_muon_huy_theo_rap($_SESSION['thong_tin_user'][0]->quan_tri_rap);
            }
            //Session::display();
            //print_r($danh_sach_ve_phim_nguoi_dung_muon_huy);

            // if($_POST["chon_phim"] && $_POST["chon_lich_chieu"])
            // {
            //     $ds_ve_phim = $model_ve_phim->lay_ds_ve_theo_lich_chieu($_POST["chon_lich_chieu"]);
            //     //print_r($ds_ve_phim);
            // }

			include_once("modules/mod_danh_sach_ve_phim.php");
        }

        function xoa_ve_phim_nguoi_dung(){
			//print_r($_POST);
			if($_POST["huy_ve"])
        	{
		    	$xoa_ve = $this->model_ve_phim->xoa_ve($_POST["id_ve"]);
		        $xoa_ghe = $this->model_ghe_phim->xoa_ghe($_POST["hang_ghe"], $_POST["cot_ghe"]);

		        echo "<script>alert('Xóa thành công !')</script>";
		        echo "<script>window.location = 'index.php?task=danh_sach_ve_phim'</script>";
        	}
			include_once ("modules/xu_ly_ve.php");
        }

        function nhan_ve_tai_rap(){
            if($_POST["nhan"])
            {
                $nhan_ve = $this->model_ve_phim->nhan_ve($_POST["id_ve"]);
                //print_r($nhan_ve);
                echo "<script>alert('Nhận vé thành công thành công !')</script>";
            }
            Session::start();
            //Session::display();
            if($_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
            {
                // echo "Xử lý admin";
                $danh_sach_ve_phim_nguoi_dung_nhan_ve = $this->model_ve_phim->thong_tin_ve_nguoi_dung_muon_nhan();
            }
            else
            {
                $danh_sach_ve_phim_nguoi_dung_nhan_ve = $this->model_ve_phim->thong_tin_ve_nguoi_dung_muon_nhan_theo_rap($_SESSION['thong_tin_user'][0]->quan_tri_rap);
            }

            include_once ("modules/mod_nhan_ve_tai_rap.php");
        }
	}            
?>

           
