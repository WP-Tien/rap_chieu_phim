<?php
include_once("model/model_so_do_ghe.php");
include_once("model/model_ghe.php");
//include_once("model/model_ve_theo_rap.php");

class c_dat_ve
{
	public $model_so_do_ghe;
	public $model_ve_phim;
	//public $model_ve_theo_rap;

	function __construct()
	{
		$this->model_so_do_ghe = new xl_so_do_ghe();
		$this->model_ve_phim = new xl_ghe();
		//$this->model_ve_theo_rap = new xl_ve_theo_rap();
	}

	function hien_thi_trang_dat_ve()
	{
		if($_POST["id_suat"] && $_POST["id_phim"] && $_POST["id_rap_phim"] && $_POST["id_ngay"])
		{
			//print_r($_POST);
			$tr_dat_ve = $this->model_so_do_ghe->danh_sach_ghe_theo_lich_chieu($_POST["id_suat"], $_POST["id_phim"]);

			$ds_ve_da_dat = $this->model_ve_phim->lay_ghe_da_dat($_POST["id_suat"]);
			
			
			//$lay_ti_le = $this->model_ve_theo_rap->phan_tram_rap($tr_dat_ve->id_rap_chieu);
			//echo "<pre>", print_r($lay_ti_le) ,"</pre>"; 
			//echo "<pre>", print_r($tr_dat_ve) ,"</pre>"; 
			include_once("view/trang_dat_ve.php");
		}
		else
		{
			echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
		}
	}
}
?>