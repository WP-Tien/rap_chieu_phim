<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="page-header">
          <h2><a href="index.php" style="color: black; text-decoration: none;">Trang chủ ></a><small style="color:#fcb040"> Trang đặt vé</small></h2>
        </div>
    </div>
</div>

<div class="container">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 20px;background-color: #222;color: white; padding: 20px;}">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<img src="images/phim/<?php echo $tr_dat_ve->poster; ?>" class="img-responsive" alt="Image" style="margin:0 auto;">
		</div>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<p style="font-size: 30px; font-weight: bold;"><?php echo $tr_dat_ve->ten_phim; ?></p>
			<p style="font-size: 20px;">Tên rạp: <?php echo $tr_dat_ve->ten_rap_chieu; ?></p>
			<p style="font-size: 20px;">Ngày chiếu: <?php echo $_POST["id_ngay"]; ?></p>
			<p style="font-size: 20px;">Giờ chiếu: <?php echo $tr_dat_ve->gio_chieu; ?><span> | <?php echo $tr_dat_ve->ten_phong_chieu; ?></span>
			</p>
			<p style="font-size: 20px;">Giá phim: <?php echo ($tr_dat_ve->gia); ?> VNĐ</p>
			<!-- + (($tr_dat_ve->gia)*($lay_ti_le->ti_le)/100) -->
		</div>
	</div>
</div>


<div class="container">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:20px; padding-bottom:20px; background-color: #eee">
		<div class="row" style="padding: 10px;">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3 style="color:#fcb040; font-weight: bold">VUI LÒNG CHỌN GHẾ</h3>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3 style="color:#fcb040; font-weight: bold; text-align: right;">THỜI GIAN CÒN LẠI <span style="font-style: italic; color: #8a6d3b" id="dem_nguoc">600</span> s </h3> 
			</div>
			<p style="font-size: 15px; font-weight: bold; color:#8a6d3b;">Xin chào <?php session_start(); echo $_SESSION['thong_tin_user'][0]->ho_ten;?></p>
			<p style="font-size: 15px; font-weight: bold; color:#8a6d3b;">Lưu ý: Nhấp chuột vào bất kỳ ghế màu cam nào bạn muốn ngồi để chọn ghế.</p>
			<p style="font-size: 15px; font-weight: bold; color:#8a6d3b;">Vị trí màn hình không thể hiện chính xác khoảng cách từ hàng ghế đầu tiên đến màn hình.</p>
			<p style="font-size: 15px; font-weight: bold; color:#8a6d3b;">Hệ thống đặt vé chỉ cho phép bạn đặt tối đa 5 ghế trong 1 lượt đặt.</p>
			<p style="font-size: 15px; font-weight: bold; color:#8a6d3b;">Mọi thắc mắc liên quan đến giao dịch vui lòng gọi đến hotline 01207768350  (Lưu ý: Hotline hoạt động mỗi ngày từ 8h – 22h) hoặc gởi email về nguyenhuutien.it.3895@gmail.com</p>
		</div>
		<img src="images/background/SeatScreen.png" class="img-responsive" alt="Image" style="margin:0 auto;">
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2" style="margin-top: 20px;">
			<form action="">
			<div class="wrap-ghe" style="text-align: center; margin: 0 auto; padding-bottom: 80px;">
			<?php
			//echo $tr_dat_ve->id_lich_chieu;
			$so_hang_cot = $tr_dat_ve->so_hang_cot;
			$loi_di = $tr_dat_ve->loi_di;
			$so_ghe = $tr_dat_ve->so_ghe;
			$ghe_hu = $tr_dat_ve->vi_tri_ghe_hu;
			$mang_ghe_hu = explode(",",$ghe_hu);
			$mang_so_hang_cot = explode(",",$so_hang_cot);
			$mang_loi_di = explode(",",$loi_di);
			$dem_mang = count($mang_loi_di);
			//$dem_mang_ghe_hu = count($mang_ghe_hu);
			$so_hang = $mang_so_hang_cot[0];
			$so_cot = $mang_so_hang_cot[1];

			$tong_ghe = $so_hang * $so_cot;
			//print_r($mang_ghe_hu);
			
			$mang_bang_chu_cai = array(1=>"A",
										2=>"B",
										3=>"C",										
										4=>"D",
										5=>"E",										
										6=>"F",
										7=>"G",										
										8=>"H",
										9=>"I",										
										10=>"J",
										11=>"K",										
										12=>"L",
										13=>"M",										
										14=>"N",
										15=>"O",										
										16=>"P",
										17=>"Q",										
										18=>"R",
										19=>"S",										
										20=>"T",
										21=>"U",
										22=>"V",
										23=>"W",
										24=>"X",
										25=>"Y",
										26=>"Z");
					$so_ghe_da_in = 0;
					for($i = 1; $i <= $so_hang; $i ++ )
					{
						?>
						<div class="ghe" style="float:right; background:transparent;">
						<?php
							echo $mang_bang_chu_cai[$i];
						?>
						</div>
						<?php
						for($j = 1; $j <= $so_cot; $j ++)
						{
							if($so_ghe <= $so_ghe_da_in)
							{
								break;
							}

					?> 
					<div class="ghe 
							<?php
								foreach($ds_ve_da_dat as $ve_da_dat)
								{
									if ($ve_da_dat->vi_tri_hang_ghe == $i && $ve_da_dat->vi_tri_cot_ghe == $j)
									{
										echo "da_chon";
									}
								}
							?>
							" data-vi-tri-hang-ghe="<?php echo $i; ?>" data-vi-tri-cot-ghe="<?php echo $j; ?>" id-ghe="<?php echo $ve_da_dat->id;?>">
						<?php

							echo $mang_bang_chu_cai[$i] . '-' . $j;
							$so_ghe_da_in ++;
						?>
					</div>
					<?php
						if ($j == $so_cot)
						{
						?>
							<div style="clear: both;"></div>
						<?php
						}

						for($x = 0; $x < $dem_mang ; $x ++)
						{
							if($j == $mang_loi_di[$x])
							{
								?>
								<div class="duong_di"></div>
								<?php
							}	
						}

					?>

			<?php
 					}
 				}
 				?>
 				<div style="clear: both;"></div>
 				<?php
				for($j = 1; $j <= $so_cot; $j ++)
				{
					?>
					<div class="ghe" style="background:transparent;">
						<?php
							echo  $j;
					?>
					</div>
					<?php
					for($x = 0; $x < $dem_mang ; $x ++)
						{
							if( $j == $mang_loi_di[$x])
							{
								?>
								<div class="duong_di"></div>
								<?php
							}	
						}
				}
			?>
			
			</div>
				<div style="clear:both"></div>
				<div class="btn btn-default huy_ve" style="height: 50px; width: 49%; padding: 12px; box-shadow: 2px 2px;">HỦY GHẾ</div>
				<div class="btn btn-warning thanh_toan" style="height: 50px; width: 49%; padding: 12px; box-shadow: 2px 2px black;">		<span class="tt_tat">THANH TOÁN</span> 
					<span class="block_all"><img src="images/loading.gif" class="img-responsive" alt="Image" style="width: 80px;position: absolute; right: 160px; bottom: 13px;"></span>
				</div>
			</form>
			</div>
</div>
</div>

<div class="container">
    <div class="man_hinh_den">
	   <form>
			    <div class="tieu_de_form"><h1>Thông Tin Đặt Vé</h1>      
			    </div>
			    <div class="col-xs-3 col-xs-offset-2">CHỌN LOẠI THẺ:</div>
			    <div class="col-xs-5">
				    <select name="" style="padding: 6px 12px; font-size: 14px;">
				    	<option value="">Visa</option>
				    	<option value="">ATM Card</option>
				    	<option value="">One phay</option>
				    </select>
				</div>
				<div class="clear-both" style="clear: both;"></div>
			    <div class="col-xs-3 col-xs-offset-2">NHẬP SỐ THẺ: </div>
			    <div class="col-xs-5"><input type="text" class="so_the form-control" placeholder="Bắt buộc *" /></div>
			    <div class="clear-both" style="clear: both;" ></div>
			    <div class="col-xs-3 col-xs-offset-2">HỌ TÊN:</div>
			    <div class="col-xs-5"><input type="text" class="ho_ten form-control" readonly="readonly"  value="<?php session_start(); echo $_SESSION['thong_tin_user'][0]->ho_ten;?>"/></div>
			    <div class="clear-both" style="clear: both;"></div>
			    <div class="col-xs-3 col-xs-offset-2">EMAIL: </div>
			    <div class="col-xs-5"><input type="text" class="email form-control" readonly="readonly"/ value="<?php session_start(); echo $_SESSION['thong_tin_user'][0]->email;?>"></div>
			    <div class="clear-both" style="clear: both;"></div>
			    <div class="col-xs-3 col-xs-offset-2">CMND:</div>
			    <div class="col-xs-5"><input type="text" class="cmnd form-control" placeholder="Chứng minh thư 9 số *" ></div>
			    <div class="clear-both" style="clear: both;"></div>
			    <div class="col-xs-3 col-xs-offset-2">DI ĐỘNG: </div>
			    <div class="col-xs-5"><input type="text" class="di_dong form-control" placeholder="Số điện thoại từ 9 - 11 số *"/></div>
			    <div class="clear-both" style="clear: both;"></div>
			    <div class="col-xs-3 col-xs-offset-2"></div>
			    <div class="col-xs-5">		    
			    	<div class="btn btn-primary dat_ve " style="width: 100%; height: 40px; padding: 10px">
			        	<span class="glyphicon glyphicon-credit-card"></span> ĐẶT VÉ
			    	</div>
				</div>

			    <div class="btn btn-danger btn-close">
			        <span class="glyphicon glyphicon-remove"></span>
			    </div>
	  		</form>
	</div>

</div>

    	<div class="man_hinh_cho" style="background: rgba(0,0,0,0.2); width: 100%; height: 100%; z-index: 1000000; position: fixed; top: 0; bottom: 0; display: none;">
    			<img src="images/pageload.gif" class="img-responsive" alt="Image" style="    width: 100px;
    height: 100px;
    text-align: center;
    margin: 0 auto;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);">
    			Đang xử lý đặt vé ...
    	</div>

<script type="text/javascript" src="vendor/js/jquery-3.2.1.js" ></script>
<script type="text/javascript">

  $(function() {
      list_ghe = $('.ghe');
      var count = 0;

      $('.huy_ve').click(function() {
	      	window.location.reload();
      });

      list_ghe.on('click', function(){
          //alert( $(this).attr("data-vi-tri-hang-ghe")+ '-' + $(this).attr("data-vi-tri-cot-ghe"));
          if( count >= 5)
          {
          	 alert("Bạn đã chọn xong 5 ghế");
          	 return false;
          }
          if($(this).hasClass('da_chon'))
          {
          	return false;
          }
      	  if($(this).hasClass("active"))
          {
            $(this).removeClass("active");
            count --;
          }
          else
          {
            $(this).addClass("active");
            count ++;
          }

      });

      // Xét form 




      $('.dat_ve').click(function() {
      //console.log($(".ghe.active"));

      var good = 1;
      var cmnd = $('.cmnd').val();
      var cmnd_isNaN = isNaN(cmnd);
      var cmnd_length = cmnd.length;

      var di_dong = $('.di_dong').val();
      var di_dong_isNaN = isNaN(di_dong);
      var dd_length = di_dong.length;

      var so_the = $('.so_the').val();
      var so_the_isNaN = isNaN(so_the);
	 

	  //console.log(dd_length);

      if( so_the == "")
      {
      	alert(" Số thẻ bỏ trống sao thanh toán bà nội !");
      	var good = 0;
      }   
      if ( so_the_isNaN == true )
      {
      	alert("Số thẻ phải là số !");
      	var good = 0;
      }

      if( cmnd == "")
      {
      	alert(" Không được bỏ trống cmnd !");
      	var good = 0;
      }
      else if ( cmnd_isNaN == true && good == 0)
      {
      	alert(" Chứng mình thư phải là số !");
      	var good = 0;
      }
      else if ( cmnd_length < 9 || cmnd_length > 9 && good == 0)
      {
      	alert(" Chứng minh thư phải là 9 số !");
      	var good = 0;
      }
      else 
      {
      	var good = 1;
      }

		if( di_dong == "")
		{
			alert(" Không được bỏ trống di động !");
			var good = 0;
		}
		else if( di_dong_isNaN == true && good == 0)
		{
			alert("Số di động là số !");
			var good = 0;
		}
		else if ( dd_length < 9 || dd_length > 11 && good == 0)
		{
			alert(" Số điện thoại phải 9 - 11 số !");
			var good = 0;
		}
		else
		{
			var good = 1;

			 mang_ghe = [];
	         $.each($(".ghe.active"), function(index, value){
	            mang_ghe.push({ hang: $(value).attr("data-vi-tri-hang-ghe"), cot: $(value).attr("data-vi-tri-cot-ghe"), id_ghe: $(value).attr("id-ghe"),
	        	});
	        });
	        $('.man_hinh_cho').show();
		}

      if( good == 1 && mang_ghe.length > 0)
      {
            // console.log(mang_ghe);
                $.ajax({
                url: "xu_ly_dat_ve_phim.php?task=xu_ly_ghe_phim",
                method: "POST",
                data: {ds_ghe: mang_ghe,id_lich_chieu: <?php echo $tr_dat_ve->id_lich_chieu; ?>, gia: <?php echo ($tr_dat_ve->gia); ?>, id_nguoi_dung: <?php echo $_SESSION['thong_tin_user'][0]->id; ?>, ho_ten_nguoi_mua: "<?php echo $_SESSION['thong_tin_user'][0]->ho_ten; ?>", cmnd: $('.cmnd').val(), di_dong: $('.di_dong').val(),  email: $('.email').val(), id_phong_chieu: <?php echo $tr_dat_ve->id_phong_chieu; ?>},
                success: function(data)
                {
                  //console.log(data);
                  alert("Bạn đã đặt vé thành công");
                  window.location = "index.php?task=tnd";
                }
             });
        }
        else
        {
		      alert("Bạn đã đặt vé thất bại !");
	          window.location = "index.php?task=tdv";
        }
    });



      thoi_gian = $('#dem_nguoc').html();
      setInterval(function(){
      	if(thoi_gian == 0)
      	{
      		alert("Thời gian đặt vé đã hết");
      		window.location = "<?php echo $_SERVER["HTTP_REFERER"]; ?>";
      	}
      	thoi_gian --;
      	$('#dem_nguoc').html(thoi_gian);
      }, 1000);  /*1000 milliseconds*/


      var man_hinh_den;
      $('.thanh_toan').click(function() {
      	$('.block_all').show();	
      	$('.tt_tat').hide();
      	man_hinh_den = setTimeout(man_hinh_den,2000);
      });

      function man_hinh_den() {
      	$('.man_hinh_den').show();
      	$('.block_all').hide();
      	document.body.style.overflow = 'hidden';
      	clearInterval(man_hinh_den);
      }

       $('.btn-close').click(function() {
      	// $('.man_hinh_den').hide();
      	// $('.tt_tat').show();
		      alert("Bạn đã đặt vé thất bại !");
	          window.location = "<?php echo $_SERVER["HTTP_REFERER"]; ?>";
      });



  });
</script>