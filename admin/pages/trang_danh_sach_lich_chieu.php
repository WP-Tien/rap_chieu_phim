<?php
	include_once("../model/model_lich_chieu.php");
	include_once("../model/model_phim.php");
	include_once("../model/model_rap_phim.php");
	include_once("../session.php");


	class c_lich_chieu {
		public $model_rap_phim;
		public $model_phim;
		public $model_lich_chieu;

		function __construct()
		{
			$this->model_lich_chieu = new xl_lich_chieu();
			$this->model_phim = new xl_phim();
			$this->model_rap_phim = new xl_rap_phim();
		}

		function hien_thi_danh_sach_lich_chieu()
		{
			Session::start();
			//Session::display();
			if ($_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
			{
				$danh_sach_lich_chieu = $this->model_lich_chieu->danh_sach_lich_chieu();
			}
            else 
            {
				$danh_sach_lich_chieu = $this->model_lich_chieu->danh_sach_lich_chieu_theo_rap($_SESSION['thong_tin_user'][0]->quan_tri_rap <> 0);
            }

			//print_r($danh_sach_lich_chieu);

			include_once("modules/mod_danh_sach_lich_chieu.php");
		}

		function them_lich_chieu()
		{
			Session::start();
			//Session::display();

			$danh_sach_phim_dang_chieu = $this->model_phim->danh_sach_phim_dang_chieu();
			$lay_phong_theo_rap = $this->model_rap_phim->lay_phong_theo_rap($_SESSION['thong_tin_user'][0]->quan_tri_rap);
			// if ($_SESSION['thong_tin_user'][0]->quan_tri_rap == 0)
			// {
			// 	$danh_sach_lich_chieu = $this->model_lich_chieu->danh_sach_lich_chieu();
			// }
			// else
			// {
			// 	$danh_sach_phim_dang_chieu_theo_rap = $this->model_phim->danh_sach_phim_dang_chieu_theo_rap($id_rap);
			// }

			if($_POST["them_lich"])
			{
				//date_default_timezone_set('Asia/Ho_Chi_Minh');

				$lay_phim = $this->model_phim->lay_phim_theo_id($_POST["chon_phim"]);

				$date = date_create($_POST["ngay_gio_chieu"]);
				$gio_bat_dau = date_timestamp_get($date);
				$gio_ket_thuc = $gio_bat_dau + ($lay_phim->do_dai_phim)*60;
				$xet_ngay_bat_dau = date('Y/m/d H:i:s', $gio_bat_dau);
				$xet_ngay_ket_thuc = date('Y/m/d H:i:s', $gio_ket_thuc);

				$kiem_tra = $this->model_lich_chieu->kiem_tra_ngay($xet_ngay_bat_dau, $xet_ngay_ket_thuc, $_POST["chon_phong"]);

				//print_r($kiem_tra);

				//echo date('Y/m/d H:i:s',$gio_bat_dau);
				//echo date('Y/m/d H:i:s',$gio_ket_thuc);

				if(!$kiem_tra)
				{
					//echo "Hợp lệ nhé !";
					// Xử lý ở đây
					//print_r($_POST);

						$them_lich_chieu = $this->model_lich_chieu->them_moi_lich_chieu($_POST["chon_phim"], $_POST["chon_phong"], $xet_ngay_bat_dau, $xet_ngay_ket_thuc);

					
				}
				else
				{
					echo "<script> alert('Ngày giờ khởi chiếu và ngày giờ kết thúc không hợp lệ');</script>";
				}



			}
			//print_r($lay_phong_theo_rap);
		
			include_once("modules/mod_them_lich_chieu.php");
		}

		function huy_lich_chieu()
		{
			if($_POST["xoa_lich"])
			{
				//print_r($_POST);
				$danh_sach_lich_chieu = $this->model_lich_chieu->xoa_lich_chieu($_POST["id_lich"]);

				echo "<script>alert('Xóa thành công !')</script>";
		        echo "<script>window.location = 'index.php?task=danh_sach_lich_chieu'</script>";
			}
			include_once("modules/xu_ly_lich_chieu.php");
		}
	}


?>