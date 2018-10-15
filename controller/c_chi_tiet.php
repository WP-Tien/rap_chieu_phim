<?php 
include_once("model/model_phim.php");
include_once("model/model_dien_vien.php");
include_once("model/model_loai_phim.php");
include_once("model/model_rap_phim.php");


class c_chi_tiet {

	public $model_phim;
	public $model_dien_vien;
	public $model_loai_phim;
	public $model_rap_phim;


	function __construct()
	{
		$this->model_phim = new xl_phim();
		$this->model_dien_vien = new xl_dien_vien();
		$this->model_loai_phim = new xl_loai_phim();
		$this->model_rap_phim = new xl_rap_phim();

	}

	function hien_thi_trang_chi_tiet()
	{
		if( $_GET["id"]) 
		{
			//print_r("$_POST");
			$chi_tiet_phim_theo_id = $this->model_phim->lay_phim_theo_id($_GET["id"]);


			$lay_phim_theo_id_ko_lc = $this->model_phim->lay_phim_theo_id_ko_lc($_GET["id"]);

			$lay_ds_dien_vien_theo_id_phim = $this->model_dien_vien->lay_ds_dien_vien_theo_id_phim($_GET["id"]);
			$lay_ds_loai_phim_theo_id_phim = $this->model_loai_phim->lay_ds_loai_phim_theo_id_phim($_GET["id"]);

			$lay_ds_rap_theo_id = $this->model_rap_phim->lay_ds_rap_theo_id($_GET["id"]);

			// side bar
			$ds_phim_dang_chieu = $this->model_phim->danh_sach_phim_dang_chieu();
			$ds_rap_chieu = $this->model_rap_phim->danh_sach_rap_phim();
			
			
			include_once("view/trang_chi_tiet.php");	
			include_once("view/side_bar.php");
		}
	}
}

?>