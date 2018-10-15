<?php
include_once("model/model_binh_luan.php");
include_once("model/model_rap_phim.php");
include_once("model/model_phim.php");

class c_list_su_kien
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

	function hien_thi_list_su_kien()
	{	
		include_once("libraries/pager.php");
		$phan_trang = new phan_trang();

		$ds_su_kien = $this->model_binh_luan->lay_ds_su_kien();
		$ds_rap_chieu = $this->model_rap_phim->danh_sach_rap_phim();
		$ds_phim_dang_chieu = $this->model_phim->danh_sach_phim_dang_chieu();

		include_once("view/list_su_kien.php");
		include_once("view/side_bar.php");
		//print_r($ds_rap_chieu);
	}

}
?>