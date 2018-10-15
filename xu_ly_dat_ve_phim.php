<?php
	include_once("class.phpmailer.php");
	include_once("class.smtp.php");

	if($_POST)
	{
		if($_GET["task"] == "ds_phim")
		{
			include_once("model/model_phim.php");
			$model_phim = new xl_phim();
			$ds_phim_dang_chieu_theo_rap = $model_phim->danh_sach_phim_dang_chieu_theo_rap($_POST["id_rap_phim"]);
			//print_r($ds_phim_dang_chieu_theo_rap);

			echo json_encode($ds_phim_dang_chieu_theo_rap, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
		}

		if($_GET["task"] == "ds_ngay")
		{
			//print_r($_POST);
			include_once("model/model_phim.php");
			$model_phim = new xl_phim();
			$ds_ngay = $model_phim->danh_sach_ngay_chieu_theo_rap($_POST["id_rap_phim"], $_POST["id_phim"]);
			//print_r($ds_ngay);
			
			echo json_encode($ds_ngay, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
		}

		if($_GET["task"] == "ds_gio")
		{
			//print_r($_POST);
			include_once("model/model_phim.php");
			$model_phim = new xl_phim();
			$ds_gio = $model_phim->danh_sach_gio_chieu_theo_ngay($_POST["id_rap_phim"], $_POST["id_phim"], $_POST["ngay"]);
			//print_r($ds_gio);

			echo json_encode($ds_gio, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
		}

		//Menu đặt vé
		if($_GET["task"] == "ds_phim_dang_chieu")
		{
			//print_r($_POST);
			if($_POST["tag"] == "phim")
			{
				include_once("model/model_phim.php");
				$model_phim = new xl_phim();
				$danh_sach_phim_dang_chieu = $model_phim->danh_sach_phim_dang_chieu();

				//print_r($danh_sach_phim_dang_chieu);


				echo json_encode($danh_sach_phim_dang_chieu, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
			}
		}		

		if($_GET["task"] == "ds_rap_chieu_theo_phim")
		{
			//print_r($_POST);
			include_once("model/model_phim.php");
			$model_phim = new xl_phim();
			$danh_sach_rap = $model_phim->danh_rap_theo_phim($_POST["id_phim"]);

			//print_r($danh_sach_rap);

			echo json_encode($danh_sach_rap, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
		}

		if($_GET["task"] == "ds_suat_chieu")
		{
			//print_r($_POST);
			include_once("model/model_phim.php");
			$model_phim = new xl_phim();
			$danh_sach_ngay_gio = $model_phim->danh_sach_ngay_gio($_POST["id_rap"], $_POST["id_phim"]);

			//print_r($danh_sach_ngay_gio);

			echo json_encode($danh_sach_ngay_gio, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
		}

		if($_GET["task"] == "ds_rap_chieu_co_phim_dang_chieu")
		{
			if($_POST["tag"] == "rap")
			{
				include_once("model/model_phim.php");
				$model_phim = new xl_phim();
				$danh_sach_rap_co_phim_dang_chieu = $model_phim->danh_sach_rap_co_phim_dang_chieu();

				//print_r($danh_sach_phim_dang_chieu);


				echo json_encode($danh_sach_rap_co_phim_dang_chieu, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
			}
		}

		if($_GET["task"] == "danh_sach_phim_dang_chieu_theo_rap") // dùng lại ds_phim trên
		{
			include_once("model/model_phim.php");
			$model_phim = new xl_phim();
			$ds_phim_dang_chieu_theo_rap = $model_phim->danh_sach_phim_dang_chieu_theo_rap($_POST["id_rap_phim"]);
			//print_r($ds_phim_dang_chieu_theo_rap);

			echo json_encode($ds_phim_dang_chieu_theo_rap, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
		}

		if($_GET["task"] == "ds_suat_chieu_theo_rap_theo_phim")
		{
			//print_r($_POST);
			include_once("model/model_phim.php");
			$model_phim = new xl_phim();
			$danh_sach_ngay_gio = $model_phim->danh_sach_ngay_gio($_POST["id_rap"], $_POST["id_phim"]);

			//print_r($danh_sach_ngay_gio);

			echo json_encode($danh_sach_ngay_gio, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
		}

		if($_GET["task"] == "danh_sach_ngay_chieu_co_phim_dang_chieu")
		{
			if($_POST["tag"] == "suat")
			{
			include_once("model/model_phim.php");
			$model_phim = new xl_phim();
			$danh_sach_ngay_gio = $model_phim->danh_sach_ngay_chieu_co_phim_dang_chieu();

			echo json_encode($danh_sach_ngay_gio, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
			}
		}

		if($_GET["task"] == "danh_sach_rap_theo_ngay")
		{
			//print_r($_POST);
			include_once("model/model_phim.php");
			$model_phim = new xl_phim();
			$danh_sach_rap_theo_ngay = $model_phim->danh_sach_rap_theo_ngay($_POST["id_ngay"]);

			echo json_encode($danh_sach_rap_theo_ngay, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
		}		

		if($_GET["task"] == "danh_sach_phim_gio_chieu_theo_ngay_va_rap")
		{
			//print_r($_POST);
			include_once("model/model_phim.php");
			$model_phim = new xl_phim();
			$danh_sach_phim_gio_chieu_theo_ngay_va_rap = $model_phim->danh_sach_phim_gio_chieu_theo_ngay_va_rap($_POST["id_ngay"], $_POST["id_rap_phim"]);

			echo json_encode($danh_sach_phim_gio_chieu_theo_ngay_va_rap, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
		}


		//Dat ve phim trong trang dat ve
		if($_GET["task"] == "xu_ly_ghe_phim")
		{
			//print_r($_POST);
			include_once("model/model_ghe.php");
			$model_ghe = new xl_ghe();
			include_once("model/model_ve.php");
			$model_ve = new xl_ve();
			include_once("model/model_quan_tri.php");
			$model_quan_tri = new xl_nguoi_dung();

			$bien_dem = 0;
			$diem_cong = 0;
			//$ds_ve_da_dat = $model_ghe->lay_ghe_da_dat($_POST["id_lich_chieu"]);

			$diem_hien_tai = $model_quan_tri->lay_diem_nguoi_dung($_POST["id_nguoi_dung"]);
			// $diem = $diem_hien_tai->diem_tich_luy;
			// $diem_cong = $diem + 10;
			// $cong_diem_cho_nguoi_dung = $model_quan_tri->cong_diem_cho_nguoi_dung($diem_cong, $_POST["id_nguoi_dung"]);

			print_r($_POST["ds_ghe"]);
			print_r($_POST);

			foreach ($_POST["ds_ghe"] as $ghe) {
				//$bien_dem ++;
				$ds_ghe_tam = $model_ghe->dat_ve_phim_tam($ghe,$_POST["id_phong_chieu"]);

				$ds_id_ghe[] = $model_ghe->lay_id_ghe_theo_vi_tri($ghe);
			}

			foreach ($ds_id_ghe as $id_ghe){
				$bien_dem ++;
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				
				$ds_ve_tam = $model_ve->dat_ve_nguoi_dung($id_ghe->id, $_POST["id_lich_chieu"], $_POST["gia"], $_POST["email"], $_POST["ho_ten_nguoi_mua"], $_POST["id_nguoi_dung"], date('Y-m-d H:i:s'));
			}


				// Cộng điểm cho người dùng
				$diem = $diem_hien_tai->diem_tich_luy;
				$diem_cong = $diem + 10*$bien_dem;
				$cong_diem_cho_nguoi_dung = $model_quan_tri->cong_diem_cho_nguoi_dung($diem_cong, $_POST["id_nguoi_dung"]);


			// foreach ($ds_id_ghe as $a) {
			// print_r($a->id);
			// }
			
			// print_r($ds_ve_da_dat);

			if ($ds_ghe_tam && $ds_ve_tam)
			{
		        $mail = new PHPMailer();

		        $body = "<h2 style='color: #fcb040' > Hệ thống NHT STAR xin thông báo ! </h2><h5 style='color:red'>Chào ". $_POST["ho_ten_nguoi_mua"]  ." đã mua $bien_dem vé tại rạp phim NHT Star</h5><p>". $content_mail ."</p>";

		        //$body = eregi_replace("[\]",'',$body);

		        $mail->IsSMTP(); // telling the class to use SMTP
		        //$mail->Host = "ssl://smtp.gmail.com"; //SMTP server 
		        $mail->SMTPDebug = 2;       //enables SMTP debug information (for tersting)
		                                    // 1 = errors and messages
		                                    // 2 = messages only
		        $mail->SMTPAuth = true;     // enable SMTP authentication
		        $mail->SMTPSecure ="ssl";   //set the prefix to the server 
		        $mail->SMTPOptions = array(
			        'ssl' => array(
			            'verify_peer' => false,
			            'verify_peer_name' => false,
			            'allow_self_signed' => true
			        )
			    );
		        $mail->Host = "ssl://smtp.gmail.com"; //sets GMAIL as the SMTP server
		        $mail->Port = 465;          //set the SMTP port for the GMAIL server 
		        $mail->Username ="nguyenhuutien.it.3895@gmail.com";        //GMAIL username
		        $mail->Password = "Huutien03081995";       // GMAIL password

		        $mail->SetFrom('contact@prsps.in','PRSPS');

		        $mail->Subject = "Thank you for booking !";

		        // $mail->AddReplyTo("user2@gmail.com ',' First last");

		        $mail->MsgHTML($body);

		        $address = $_POST["email"];
		        $mail->AddAddress($address, $_POST["ho_ten_nguoi_mua"]);

		        //$mail->AddAttachment("images/phpmailer.gif");
		        //$mail->AddAttachment("images/phpmailer_mini.gif");

		        if(!$mail->Send())
		        {
		            echo "Mailer Error: ". $mail->ErrorInfo;
		        }  
		        else
		        {
		            echo "Message sent!";
		        }
    
			}
		}


		if($_GET["task"] == "xu_ly_huy_ve_nguoi_dung")
		{
			//print_r($_POST["id_ve"]);

			include_once("model/model_ve.php");
			$model_ve = new xl_ve();
			$xu_ly_huy_ve_nguoi_dung = $model_ve->huy_ve_nguoi_dung($_POST["id_ve"]);

			echo $_POST["id_ve"];
		}

		// if($_GET["task"] = "ds_phim_theo_loai")
		// {
		// 	//print_r($_POST["id_loai_phim"]);
		// 	include("model/model_phim.php");
		// 	$model_phim = new xl_phim();
		// 	$ds_phim_theo_loai = $model_phim->ds_phim_sap_chieu_theo_loai($_POST["id_loai_phim"]);

		// 	echo json_encode($ds_phim_theo_loai, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE );	
		// }
	}

?>