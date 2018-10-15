<?php
	if($_POST["huy_lich"])
	{
		//print_r($_POST);
	?>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4">
		<form action="" method="POST" >
		<legend style="color:black;">Xác nhận hủy lịch chiếu</legend>

		<div class="form-group">
			<label for="id_lich">ID lịch:</label>
			<input name="id_lich" style="color:black; background-color: white;" type="text" class="form-control" id="id_lich" placeholder="id ve" value="<?php echo $_POST["id"]; ?>" readonly />		

			<label for="ten_phim">Tên phim:</label>
			<input name="ten_phim" style="color:black;    background-color: white;" type="text" class="form-control" id="ten_phim" placeholder="id ve" value="<?php echo $_POST["ten_phim"]; ?>" readonly />	

			<label for="ten_phong_chieu">Phòng chiếu:</label>
			<input name="ten_phong_chieu"style="color:black; background-color: white;" type="text" class="form-control" id="ten_phong_chieu" placeholder="id ve" value="<?php echo $_POST["ten_phong_chieu"]; ?>" readonly/>

			<label for="ngay_gio_chieu">Ngày giờ chiếu:</label>
			<input name="ngay_gio_chieu" style="color:black; background-color: white;" type="text" class="form-control" id="ngay_gio_chieu" placeholder="id ve" value="<?php echo $_POST["ngay_gio_chieu"]; ?>" readonly />

			<label for="ngay_gio_ket_thuc">Ngày giờ kết thúc:</label>
			<input name="ngay_gio_ket_thuc" style="color:black; background-color: white;" type="text" class="form-control" id="ngay_gio_ket_thuc" placeholder="id ve" value="<?php echo $_POST["ngay_gio_ket_thuc"]; ?>" readonly />
		</div>

		<input type="submit" class="btn btn-info" name="xoa_lich" value="Hủy lịch" />

		<button class="btn btn-warning"><a style="color:white;" href="index.php?task=danh_sach_lich_chieu">Quay lại</a></button>
	</form>
	</div>
	<?php
	}
	else 
	{
		echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
	}
	?>