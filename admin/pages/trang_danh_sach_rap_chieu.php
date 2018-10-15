<?php 
	include_once("../model/model_rap_phim.php");

	class c_quan_tri_rap {
		public $model_quan_tri;

		function __construct()
		{
			$this->model_rap_phim = new xl_rap_phim();
		}

		function hien_thi_trang_rap_chieu()
		{
			$hien_thi_trang_rap_chieu = $this->model_rap_phim->danh_sach_rap_phim();
			
			//print_r($hien_thi_trang_rap_chieu);
			include_once("modules/mod_danh_sach_rap.php");
		}

		function them_rap()
		{
			if($_POST["them_admin"])
			{
				$tag = 1;
				if( empty($_POST["ten_rap_chieu"]))
				{
					echo "<script> alert('Hãy nhập tên rạp !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["dia_chi"]))
				{
					echo "<script> alert('Hãy nhập địa chỉ !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["so_dien_thoai"]))
				{
					echo "<script> alert('Hãy nhập số điện thoại !')</script>";
					$tag = 0;
				}		
				if($tag ==1)
				{
					$them_rap = $this->model_rap_phim->them_rap($_POST["ten_rap_chieu"], $_POST["dia_chi"], $_POST["so_dien_thoai"]);

					echo "<script> alert('Thêm rạp thành công !')</script>";
				}		
			}
			
			include_once("modules/mod_them_rap.php");
		}

		function xu_ly_rap()
		{
			$tag = 1;
			if($_POST["cap_nhat_admin"])
			{
				//print_r($_POST);
				if( empty($_POST["ten_rap_chieu"]))
				{
					echo "<script> alert('Hãy nhập tên rạp !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["dia_chi"]))
				{
					echo "<script> alert('Hãy nhập địa chỉ !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["so_dien_thoai"]))
				{
					echo "<script> alert('Hãy nhập số điện thoại !')</script>";
					$tag = 0;
				}				
				
				if($tag ==1)
				{
					$cap_nhat_rap = $this->model_rap_phim->thay_doi_thong_tin_rap($_POST["id"], $_POST["ten_rap_chieu"], $_POST["dia_chi"], $_POST["so_dien_thoai"]);

					echo "<script> alert('Thay đổi thành công !')</script>";
				}
			}

			if($_POST["xoa"])
			{
				//print_r($_POST["id"]);
				$xoa_rap = $this->model_rap_phim->xoa_rap($_POST["id"]);
				echo "<script> alert('Xóa thành công !')</script>";
			}
			include_once("modules/xu_ly_rap.php");
		}
}
?>