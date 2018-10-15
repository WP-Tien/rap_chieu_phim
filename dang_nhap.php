<?php
session_start();
include_once("model/model_quan_tri.php");

$model = new xl_nguoi_dung();

if($_POST["username"] && $_POST["password"])
{
	$thong_tin_user = $model->lay_thong_tin_nguoi_dung($_POST["username"]);
	if($thong_tin_user)
	{
		
		if($thong_tin_user->password == md5($_POST["password"]))
		{
			$_SESSION["thong_tin_user"] = $thong_tin_user;

			echo "<script>alert('Đăng nhập thành công')</script>";
			echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
		}
		else
		{
			echo "<script>alert('Mật khẩu hoặc tài khoản không đúng, bạn vui lòng kiểm tra lại!')</script>";
			echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
		}
	}
	else
	{
		echo "<script>alert('Tài khoản không tồn tại, bạn vui lòng kiểm tra lại!')</script>";
		echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
	}
}

else
{
	header("location: ". $_SERVER["HTTP_REFERER"]);
}

?>