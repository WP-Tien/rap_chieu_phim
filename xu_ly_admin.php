<?php	
	if($_POST)
	{
		if($_GET["task"] == xl_so_luong)
		{
			include_once("model/model_qua.php");
			$model_qua = new xl_qua();
			$diem = $model_qua->lay_diem_theo_id($_POST["phan_thuong"]);
			
			echo json_encode($diem, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
		}
	}
?>