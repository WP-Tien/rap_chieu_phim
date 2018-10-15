<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4">
	<form action="" method="POST" >
	<legend style="color:black;">Thêm rạp</legend>

	<div class="form-group">	
		<label for="ten_rap_chieu">Tên rạp:</label>
		<input name="ten_rap_chieu" style="color:black; background-color: white;" type="text" class="form-control" id="ten_rap_chieu"  value="<?php echo $_POST["ten_rap_chieu"]; ?>"/>	

		<label for="dia_chi">Địa chỉ:</label>
		<input name="dia_chi"style="color:black; background-color: white;" type="text" class="form-control" id="dia_chi" value="<?php echo $_POST["dia_chi"]; ?>" />

		<label for="so_dien_thoai">Số điện thoại:</label>
		<input name="so_dien_thoai" style="color:black; background-color: white;" type="text" class="form-control" id="so_dien_thoai" value="<?php echo $_POST["so_dien_thoai"]; ?>" />

	</div>

	<input type="submit" class="btn btn-info" name="them_admin" value="Thêm rạp" />
	<button class="btn btn-warning"><a style="color:white;" href="index.php?task=danh_sach_rap_phim">Quay lại</a></button>
</form>
</div>