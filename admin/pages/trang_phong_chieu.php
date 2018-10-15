<?php 
	include_once("../model/model_rap_phim.php");
	include_once("../model/model_phong_chieu.php");

	class c_phong_chieu {
		public $model_phong_chieu;
		public $mode_rap_chieu;

		function __construct()
		{
			$this->model_phong_chieu = new xl_phong_chieu();
			$this->model_rap_phim = new xl_rap_phim();
		}

		function hien_tri_danh_sach_phong_chieu()
		{
			$danh_sach_phong_chieu = $this->model_phong_chieu->danh_sach_phong_chieu();

			//print_r($danh_sach_phong_chieu);
			include_once("modules/mod_phong_chieu.php");
		}

		function them_phong()
		{	
			if($_POST["them_phong"])
			{
				//print_r($_POST);
				$tag = 1;
				if(empty($_POST["ten_phong_chieu"]))
				{
				echo "<script> alert('Hãy nhập tên phòng chiếu !')</script>";
				$tag = 0;
				}				

				if(empty($_POST["so_ghe"]))
				{
				echo "<script> alert('Hãy nhập số ghế !')</script>";
				$tag = 0;
				}				

				if(empty($_POST["trang_thai"]))
				{
				echo "<script> alert('Hãy nhập trạng thái !')</script>";
				$tag = 0;
				}				

				if(empty($_POST["hang_cot"]))
				{
				echo "<script> alert('Hãy nhập họ và tên !')</script>";
				$tag = 0;
				}				

				if(empty($_POST["loi_di"]))
				{
				echo "<script> alert('Hãy nhập họ và tên !')</script>";
				$tag = 0;
				}				

				if(empty($_POST["quan_tri_rap"]))
				{
				echo "<script> alert('Hãy nhập họ và tên !')</script>";
				$tag = 0;
				}

				if ($tag == 1)
				{
					$them_phong = $this->model_phong_chieu->them_phong($_POST["ten_phong_chieu"],$_POST["so_ghe"],$_POST["trang_thai"],$_POST["hang_cot"],$_POST["loi_di"],$_POST["quan_tri_rap"]);
					echo "<script> alert('Thêm phòng thành công!')</script>";
				}
			}
			



			$ds_rap = $this->model_rap_phim->danh_sach_rap_phim();
			include_once("modules/mod_them_phong.php");
		}

		function xu_ly_phong()
		{
			$ds_rap = $this->model_rap_phim->danh_sach_rap_phim();
			$tag = 1;
			
			// print_r($ds_rap);
			if($_POST["cap_nhat_phong"])
			{
				//print_r($_POST);
				if( empty($_POST["ten_phong_chieu"]))
				{
					echo "<script> alert('Hãy nhập tên phòng !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["so_ghe"]))
				{
					echo "<script> alert('Hãy nhập số ghế !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["quan_tri_rap"]))
				{
					echo "<script> alert('Hãy chọn rạp chiếu !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["trang_thai"]))
				{
					echo "<script> alert('Hãy nhập trạng thái !')</script>";
					$tag = 0;
				}		
				if( empty($_POST["so_hang_cot"]))
				{
					echo "<script> alert('Hãy nhập số hàng, cột !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["loi_di"]))
				{
					echo "<script> alert('Hãy nhập lối đi (*,*) !')</script>";
					$tag = 0;
				}	
				if($tag ==1)
				{
					$cap_nhat_phong = $this->model_phong_chieu->thay_doi_thong_tin_phong($_POST["id"], $_POST["ten_phong_chieu"],$_POST["so_ghe"],$_POST["quan_tri_rap"],$_POST["trang_thai"],$_POST["so_hang_cot"],$_POST["loi_di"]);
					echo "<script> alert('Thay đổi thành công !')</script>";
				}


			}
			if($_POST["xoa"])
			{
				if($_POST["id"])
				{
					print_r($_POST["id"]);
					//$xoa_phong = $this->model_quan_tri->xoa_phong($_POST["id"]);
					echo "<script> alert('Xóa thành công !')</script>";
				}
			}
			include_once("modules/xu_ly_phong.php");
		}
		}
?>