<?php
	include_once("../model/model_quan_tri.php");
	include_once("../model/model_qua.php");

	class c_doi_phan_thuong {
		public $model_quan_tri;
		public $model_qua;

		function __construct()
		{
			$this->model_qua = new xl_qua();
			$this->model_quan_tri = new xl_nguoi_dung();
		}

		function hien_thi_trang_doi_phan_thuong()
		{
			$danh_sach_nguoi_dung = $this->model_quan_tri->lay_tat_ca_nguoi_dung();
		
			include_once ("modules/mod_doi_phan_thuong.php");
		}

		function xu_ly_doi_phan_thuong()
		{
			$danh_sach_qua = $this->model_qua->lay_tat_ca_qua($_POST["diem_tich_luy"]);

			//print_r($danh_sach_qua);
			if($_POST["xac_nhan"])
			{
				//print_r($_POST);
				$hoa_don_qua = $this->model_qua->hoa_don_qua($_POST["user"], $_POST["phanthuong"], $_POST["soluong"], $tong_diem);
				;
				$lay_diem_nguoi_dung = $this->model_quan_tri->lay_diem_nguoi_dung($_POST["user"]);
				$tong_diem = $_POST["diemqua"]*$_POST["soluong"];
				$diem_tich_luy = $lay_diem_nguoi_dung->diem_tich_luy;
				$diem_cap_nhat = $diem_tich_luy - $tong_diem;
				$cong_diem = $this->model_quan_tri->cong_diem_cho_nguoi_dung($diem_cap_nhat, $_POST["user"]);

			}
			include_once ("modules/xy_ly_phan_thuong.php");
		}

	}
?>