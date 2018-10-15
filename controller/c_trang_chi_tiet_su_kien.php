<?php
include_once("model/model_binh_luan.php");
include_once("model/model_rap_phim.php");
include_once("model/model_phim.php");

class c_chi_tiet_su_kien
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

	function hien_thi_chi_tiet_su_kien()
	{	
		$chi_tiet_sk = $this->model_binh_luan->lay_chi_tiet_su_kien($_GET["id_sk"]);
		$ds_su_kien_moi_nhat = $this->model_binh_luan->ds_su_kien_moi_nhat();
		$ds_rap_chieu = $this->model_rap_phim->danh_sach_rap_phim();

		$ds_phim_dang_chieu = $this->model_phim->danh_sach_phim_dang_chieu();
		

		// echo "<pre>";
		// print_r($chi_tiet_sk);
		// echo "</pre>";
		include_once("view/chi_tiet_su_kien.php");
		include_once("view/side_bar.php");
	}

}
?>