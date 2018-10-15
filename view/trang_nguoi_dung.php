<div class="container" style="margin-top: 50px;">
<div class="col-sm-12 col-md-8 col-lg-8" style="color:#555;">
    <div style="font-size: 17px;">
    <h2><a href="index.php" style="color: #555; text-decoration: none;"></a><small style="color:#fcb040; font-weight: bold;"> THÔNG TIN NGƯỜI DÙNG </small></h2>

<?php
include_once("session.php");
Session::start();
// Session::display();

if($_SESSION && $_SESSION['thong_tin_user'][0]->username )
{
?>
	<p>Tên tài khoản: <?php echo $_SESSION['thong_tin_user'][0]->ho_ten;?></p>
	<p>Tài khoản đăng nhập: <?php echo $_SESSION['thong_tin_user'][0]->username;?></p>
	<p>Email: <?php echo $_SESSION['thong_tin_user'][0]->email;?></p>
	<a href="dang_xuat.php" style="width: 20%; height: 100%; background-color: #707a7f; text-align: center; padding: 5px; outline: none; border: 0; text-transform: uppercase; font-size: 20px; font-weight: bold; color: white; box-shadow: 1px 1px 1px black; margin-top: 15px;"><i>Thoát</i></a>
	<a href="index.php" style="width: 20%; height: 100%; background-color: #fcb040; text-align: center; padding: 5px; outline: none; border: 0; text-transform: uppercase; font-size: 20px; font-weight: bold; color: white; box-shadow: 1px 1px 1px black; margin-top: 15px;"><i>Trang chủ</i></a>

   	<h2><a href="index.php" style="color: #555; text-decoration: none;"></a><small style="color:#fcb040; font-weight: bold;"> THÔNG TIN VÉ ĐẶT </small></h2>

		<table id="my_Table" class="table table-hover table-responsive table-striped" style="font-size: 15px !important;">
		<thead>
		<tr>
		<th>Id</th>
		<th>Tên phim</th>
		<th>Rạp chiếu</th>
		<th>Phòng chiếu</th>
		<th>Vị trí ghế</th>
		<th>Giá vé</th>
		<th>Ngày giờ đặt</th>
		<th>Ngày giờ chiếu *</th>
		<th>Xử lý</th>
		</tr>
		</thead>
		<tbody>
		<?php 
		if($thong_tin_ve_theo_nguoi_dung)
		{
		for ($i =0; $i < count($thong_tin_ve_theo_nguoi_dung); $i ++)
		{
		?>
		<tr>
			<td style="background-color: #fff;"><?php echo $i + 1;?></td>
			<td style="background-color: #fff;"><?php echo $thong_tin_ve_theo_nguoi_dung[$i]->ten_phim;?></td>
			<td style="background-color: #fff;"><?php echo $thong_tin_ve_theo_nguoi_dung[$i]->ten_rap_chieu;?></td>
			<td style="background-color: #fff;"><?php echo $thong_tin_ve_theo_nguoi_dung[$i]->ten_phong_chieu;?></td>
			<td style="background-color: #fff;"><?php echo $thong_tin_ve_theo_nguoi_dung[$i]->vi_tri_hang_ghe ," - ", $thong_tin_ve_theo_nguoi_dung[$i]->vi_tri_cot_ghe;?> </td>
			<td style="background-color: #fff;"><?php echo number_format($thong_tin_ve_theo_nguoi_dung[$i]->gia_ve,0,",",".") ." VNĐ" ;?></td>
			<td style="background-color: #fff;">
				<?php 
				$date = date_create($thong_tin_ve_theo_nguoi_dung[$i]->ngay_gio_dat_ve);
				echo date_format($date, 'H:i:s Y-m-d'); 
				?>	
			</td>
			<td style="background-color: #fff;">
				<?php 
				$date1 = date_create($thong_tin_ve_theo_nguoi_dung[$i]->ngay_gio_chieu);
				echo date_format($date1, 'H:i:s Y-m-d'); 
				?>
			</td>

				<?php 
					if($thong_tin_ve_theo_nguoi_dung[$i]->status_ve == 0)
					{
						?>
						<td style="background-color: #fff;">
						<p style="color: green; border:0 ; font-weight: bold; background-color: transparent; text-align: center;" >
								Đang xử lý
						</p>
						</td>
						<?php
					}
					else
					{
						?>
						<td id="huy_ve_nguoi_dung" style="background-color: #fff;" data-idve="<?php echo $thong_tin_ve_theo_nguoi_dung[$i]->id_ve_phim;?>">
						<p style="color: #ff5722; border:0 ; font-weight: bold; background-color: transparent; text-align: center; cursor: pointer;" >
								Hủy
						</p>
						</td>
						<?php
					}

				?>

		</tr>
		<?php
		}
		}
		else
		{   
		?>
		<tr>
		<td colspan="9" style="text-align: center;"><a href="index.php" style="color:black;">Đặt vé ngay !</a></td>
		</tr>   
		<?php
		} 
		?>
		</tbody>
		</table>



    <h2><a href="index.php" style="color: #555; text-decoration: none;"></a><small style="color:#fcb040; font-weight: bold;"> THÔNG TIN PHẦN THƯỞNG </small></h2>
	<p>Khi đặt vé thành công bạn sẽ được 10 điểm !</p>
	<p>Khi tới rạp hãy liên hệ với nhân viên để nhận phần thưởng. Điểm hiện tại của <?php echo $_SESSION['thong_tin_user'][0]->ho_ten;?> là <b><?php echo $thong_tin_nguoi_dung->diem_tich_luy;?></b> điểm !</p>

	<img src="images/diem-tich-luy/image-bar(2).png" class="img-responsive" alt="Image">
	   
    <h2><a href="index.php" style="color: #555; text-decoration: none;"></a><small style="color:#fcb040; font-weight: bold;">THAY ĐỔI THÔNG TIN </small></h2>


	<form action="" method="POST" role="form">
		<div class="form-group">
		<label style="margin-top: 10px;" for="hovaten">Họ và tên: </label>
		<input id="hovaten" type="text" name="hovaten" class="form-control" title="" placeholder="Họ tên" value="<?php echo $_SESSION['thong_tin_user'][0]->ho_ten;?>" style="height: 45px;" />	

		<label style="margin-top: 10px;" for="tentaikhoan">Tên tài khoản: </label>
		<input id="tentaikhoan" type="text" name="tentaikhoan" class="form-control" title="" placeholder="" value="<?php echo $_SESSION['thong_tin_user'][0]->username;?>" readonly="readonly" style="height: 45px;" />
		
		<label style="margin-top: 10px;" for="emailnguoidung">Email người dùng: </label>
		<input id="emailnguoidung" type="text" name="emailnguoidung" class="form-control" title="" placeholder="" value="<?php echo $_SESSION['thong_tin_user'][0]->email;?>" style="height: 45px;" >	
		
		<label style="margin-top: 10px;" for="matkhau">Mật khẩu: </label>
		<input id="matkhau" type="password" name="matkhau" class="form-control" title="" placeholder="" value="" style="height: 45px;">	

		<label style="margin-top: 10px;" for="matkhau2">Nhập lại mật khẩu: </label>
		<input id="matkhau2" type="password" name="matkhau2" class="form-control" title="" placeholder="" value="" style="height: 45px;">
		<input type="hidden" name="id" value="<?php echo $_SESSION['thong_tin_user'][0]->id;?>" />

		<input type="submit" value="Thay đổi" style="width: 20%; height: 100%; background-color: #fcb040; text-align: center; padding: 5px; outline: none; border: 0; text-transform: uppercase; font-size: 20px; font-weight: bold; color: white; box-shadow: 1px 1px 1px black; margin-top: 15px;" name="cap_nhat_thong_tin_nguoi_dung"/>
		</div>
	</form>

<?php
}
?>

    </div>
</div>