<?php
include_once("model/model_phim.php");
include_once("model/model_loai_phim.php");

	class c_list_phim_dang_chieu 
	{
		public $model_phim;
		public $model_loai_phim;

		function __construct()
		{
			$this->model_phim =  new xl_phim();
			$this->model_loai_phim = new xl_loai_phim();
		}

		function hien_tri_list_phim_dang_chieu()
		{
			include_once("libraries/pager.php");
			$phan_trang = new phan_trang();

			$ds_loai_phim = $this->model_loai_phim->lay_ds_loai_phim();
			

			if($_POST["lay_loai_phim"])
			{
				$danh_sach_phim_dang_chieu_theo_loai = $this->model_phim->danh_sach_phim_dang_chieu_theo_loai($_POST["id_loai_phim"]);	
			}
			else
			{
				$ds_phim_dang_chieu = $this->model_phim->danh_sach_phim_dang_chieu(); 
			}

			include_once("view/list_phim_dang_chieu.php");
		}
	}
?>