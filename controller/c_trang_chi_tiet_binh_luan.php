<?php
include_once("model/model_binh_luan.php");
include_once("model/model_rap_phim.php");
include_once("model/model_phim.php");

class c_chi_tiet_bai_viet
{
	public $model_binh_luan;
	public $model_rap_phim;
	public $model_phim;
	
	function __construct()
	{
		$this->model_binh_luan = new xl_binh_luan();
		$this->model_rap_phim = new xl_rap_phim();
		$this->model_phim = new xl_phim();
	}

	function hien_thi_chi_tiet_bai_viet()
	{	
		$chi_tiet_bl = $this->model_binh_luan->lay_chi_tiet_binh_luan($_GET["id_bl"]);
		$ds_binh_luan_moi_nhat = $this->model_binh_luan->ds_binh_luan_moi_nhat();
		$ds_rap_chieu = $this->model_rap_phim->danh_sach_rap_phim();
		$ds_phim_dang_chieu = $this->model_phim->danh_sach_phim_dang_chieu();
		

		// echo "<pre>";
		// print_r($ds_phim_dang_chieu);
		// echo "</pre>";
		include_once("view/chi_tiet_binh_luan.php");
		include_once("view/side_bar.php");
	}

}
?>