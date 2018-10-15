<?php
if($_POST)
{
	//print_r($_POST);
	include_once("model/model_quan_tri.php");
	include_once("session.php");
	

	$model = new xl_nguoi_dung();
	$thong_tin_user = $model->lay_thong_tin_nguoi_dung($_POST["tai_khoan"]);

	if($thong_tin_user->username == $_POST["tai_khoan"])
	{
		echo 'Tài khoản đã tồn tại';
		//echo json_encode($thong_tin_user);
	}
	else {
		if($_POST["mat_khau"] == $_POST["mat_khau_2"])
		{
			// Xử lý đăng kí
			$dang_ki = $model->them_nguoi_dung($_POST["tai_khoan"], $_POST["mat_khau"], $_POST["ho_ten"], $_POST["email"] );
			if($dang_ki)
			{
				echo 'Chúc mừng bạn đăng kí thành công !';
			}
		}
		else
		{
			echo 'Mật khẩu xác nhận không chính xác !';
		}
	}
}
?>