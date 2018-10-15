<?php 
	include_once("../model/model_quan_tri.php");
	include_once("../model/model_rap_phim.php");

	class c_quan_tri_admin {
		public $model_quan_tri;

		function __construct()
		{
			$this->model_quan_tri = new xl_nguoi_dung();
			$this->model_rap_phim = new xl_rap_phim();
		}

		function hien_tri_danh_sach_quan_tri()
		{
			$danh_sach_quan_tri = $this->model_quan_tri->lay_tat_ca_quan_tri();

			//print_r($danh_sach_quan_tri);
			include_once("modules/mod_danh_sach_admin.php");
		}

		function hien_thi_them_quan_tri()
		{	
			if($_POST["them_admin"])
			{
				//print_r($_POST);
				$lay_admin = $this->model_quan_tri->lay_thong_tin_quan_tri($_POST["username"]);
				$tag = 1;
				if( $lay_admin->username == $_POST["username"])
				{
					echo "<script> alert('User này đã có người dùng !')</script>";
					$tag = 0;
				}
				if( empty($_POST["username"]))
				{
					echo "<script> alert('Hãy nhập user name !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["email"]))
				{
					echo "<script> alert('Hãy nhập email !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["password"]))
				{
					echo "<script> alert('Hãy nhập password !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["ho_ten"]))
				{
					echo "<script> alert('Hãy nhập họ và tên !')</script>";
					$tag = 0;
				}	
				if ($tag == 1)
				{
					//echo "all is oke";
					$them_quan_tri = $this->model_quan_tri->them_quan_tri($_POST["username"], $_POST["password"], $_POST["ho_ten"], $_POST["email"], $_POST["quan_tri_rap"]);
				}
			}

			$ds_rap = $this->model_rap_phim->danh_sach_rap_phim();
			include_once("modules/mod_them_quan_tri.php");
		}

		function xu_ly_admin()
		{
			$ds_rap = $this->model_rap_phim->danh_sach_rap_phim();
			$tag = 1;
			if($_POST["cap_nhat_admin"])
			{
				
				if( empty($_POST["username"]))
				{
					echo "<script> alert('Hãy nhập user name !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["email"]))
				{
					echo "<script> alert('Hãy nhập email !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["password"]))
				{
					echo "<script> alert('Hãy nhập password !')</script>";
					$tag = 0;
				}				
				if( empty($_POST["ho_ten"]))
				{
					echo "<script> alert('Hãy nhập họ và tên !')</script>";
					$tag = 0;
				}	
				if($tag == 1)
				{
					$cap_nhat_admin = $this->model_quan_tri->thay_doi_thong_tin_quan_tri($_POST["id"], $_POST["email"], $_POST["ho_ten"], $_POST["password"], $_POST["quan_tri_rap"]);
					echo "<script> alert('Thay đổi thành công !')</script>";
				}	
			}
			if($_POST["xoa"])
			{
				if($_POST["id"])
				{
					$xoa_admin = $this->model_quan_tri->xoa_quan_tri($_POST["id"]);
					echo "<script> alert('Xóa thành công !')</script>";
				}
			}
			include_once("modules/xu_ly_admin.php");
		}
	}
?>