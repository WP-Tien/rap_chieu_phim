<?php
if($_POST)
{
	include_once("model/model_quan_tri.php");
	include_once("session.php");
	$model = new xl_nguoi_dung();
	$thong_tin_user = $model->lay_thong_tin_nguoi_dung($_POST["username"]);
	if($thong_tin_user->password == md5($_POST["password"]))
	{
		Session::start();
		//$_SESSION['thong_tin_user'] = ;
		Session::set('thong_tin_user',array($thong_tin_user));
		echo '<li style="float:right;color:white"><a href="index.php?task=tnd" id="ten-dang-nhap" class="nht-star-member" ><span>Xin Chào </span>'. $_SESSION['thong_tin_user'][0]->ho_ten .'</a><a href="dang_xuat.php" style="float:right;">Thoát</a></li>';
		//echo json_encode($thong_tin_user);
	}
}
else
{
	header("location: index.php");
}

?>