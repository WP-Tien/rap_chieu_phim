<?php 
include_once("model/model_quan_tri.php");
include_once("model/model_rap_phim.php");
include_once("model/model_phim.php");
include_once("model/model_ve.php");

class c_nguoi_dung {

	public $model_quan_tri;
	public $model_rap_phim;
	public $model_phim;
	public $model_ve;

	function __construct()
	{
		$this->model_quan_tri = new xl_nguoi_dung();
		$this->model_rap_phim = new xl_rap_phim();
		$this->model_phim = new xl_phim();
		$this->model_ve = new xl_ve();
	}

	function hien_thi_trang_nguoi_dung()
	{
		include_once("session.php");
		Session::start();

		$ds_rap_chieu = $this->model_rap_phim->danh_sach_rap_phim();
		$ds_phim_dang_chieu = $this->model_phim->danh_sach_phim_dang_chieu();
		$thong_tin_nguoi_dung = $this->model_quan_tri->lay_thong_tin_nguoi_dung($_SESSION['thong_tin_user'][0]->username);
		
		$thong_tin_ve_theo_nguoi_dung = $this->model_ve->thong_tin_ve_theo_nguoi_dung($_SESSION['thong_tin_user'][0]->username);

		//print_r($thong_tin_ve_theo_nguoi_dung);

		$kq = 0;
		if($_POST["cap_nhat_thong_tin_nguoi_dung"])
		{
			//print_r($_POST);
			
			if(empty($_POST["matkhau"]))
			{
				echo "<script> alert('Bạn hãy nhập mật khẩu !')</script>";
				$kq = 0;
			}			

			if(empty($_POST["matkhau2"]))
			{
				echo "<script> alert('Bạn hãy nhập mật khẩu xác nhận!')</script>";
				$kq = 0;
			}				

			if(empty($_POST["hovaten"]))
			{
				echo "<script> alert('Đảm bảo họ và tên bạn điền đầy đủ !')</script>";
				$kq = 0;
			}			

			if(empty($_POST["emailnguoidung"]))
			{
				echo "<script> alert('Đảm bảo email bạn điền đầy đủ !')</script>";
				$kq = 0;
			}

			if($_POST["matkhau"] == $_POST["matkhau2"]){
				$kq = 1;
			}
			else 
			{
				echo "<script> alert('Xin nhập lại 2 mật khẩu')</script>";
				$kq = 0;
			}


			if($kq == 1 && $_POST["hovaten"] && $_POST["emailnguoidung"] && $_POST["matkhau"] && $_POST["id"]){
				$cap_nhat_nguoi_dung = $this->model_quan_tri->thay_doi_thong_tin_nguoi_dung($_POST["hovaten"], $_POST["emailnguoidung"], $_POST["matkhau"], $_POST["id"]);
				session_start();
				unset($_SESSION["thong_tin_user"]);
				echo "<script> alert('Bạn cập nhật thành công !')</script>";
				echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
			}
			else{
				?>
				<script type="text/javascript" >
					alert("Thay đổi thất bại !");
				</script>
				<?php
			}
		}
		
		include_once("view/trang_nguoi_dung.php");
		include_once("view/side_bar.php");
	}



}	
?>