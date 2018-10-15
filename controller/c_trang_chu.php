<?php
include_once("model/model_phim.php");
include_once("model/model_slide_banner.php");
include_once("model/model_rap_phim.php");
include_once("model/model_binh_luan.php");

class c_trang_chu{

	public $model_phim;
	public $model_slide_banner;
	public $model_rap_phim;
	public $model_binh_luan;

	function __construct()
	{
		$this->model_phim = new xl_phim();
		$this->model_slide_banner = new xl_slide_banner();
		$this->model_rap_phim = new xl_rap_phim();
		$this->model_binh_luan = new xl_binh_luan();
	}

	function ds_phim_dang_chieu()
	{
		return $ds_phim_dang_chieu = $this->model_phim->danh_sach_phim_dang_chieu();
	}

	function ds_phim_sap_chieu()
	{
		return $ds_phim_sap_chieu = $this->model_phim->danh_sach_phim_sap_chieu();
	}

	function hien_trang_chu()
	{	
		$ds_slide = $this->model_slide_banner->danh_sach_slide_banner();
		$ds_rap_chieu = $this->model_rap_phim->danh_sach_rap_phim();
		$ds_binh_luan_moi_nhat = $this->model_binh_luan->ds_binh_luan_moi_nhat();
		$ds_su_kien_moi_nhat = $this->model_binh_luan->ds_su_kien_moi_nhat();

		include_once("view/slide.php");
		include_once("view/phim_sc_dc.php");
        include_once("view/binh_luan.php"); 
        include_once("view/dat_ve.php");	
		include_once("view/su_kien.php");
		//print_r($ds_su_kien_moi_nhat);
	}

}
?>