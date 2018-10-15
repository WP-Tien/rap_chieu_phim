<?php
	if($_POST["huy"])
	{
		//print_r($_POST);
	?>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4">
		<form action="" method="POST" >
		<legend style="color:black;">Xác nhận hủy vé</legend>

		<div class="form-group">
			<label for="id_ve">ID vé:</label>
			<input name="id_ve" style="color:black; background-color: white;" type="text" class="form-control" id="id_ve" placeholder="id ve" value="<?php echo $_POST["id_ve"]; ?>" readonly />		

			<label for="hang_ghe">Số hàng ghế:</label>
			<input name="hang_ghe"style="color:black;    background-color: white;" type="text" class="form-control" id="hang_ghe" placeholder="id ve" value="<?php echo $_POST["hang_ghe"]; ?>" readonly />	

			<label for="cot_ghe">Số cột ghế:</label>
			<input name="cot_ghe"style="color:black; background-color: white;" type="text" class="form-control" id="cot_ghe" placeholder="id ve" value="<?php echo $_POST["cot_ghe"]; ?>" readonly/>

			<label for="ho_ten_nguoi_mua">Họ tên người mua:</label>
			<input name="ho_ten_nguoi_mua" style="color:black; background-color: white;" type="text" class="form-control" id="ho_ten_nguoi_mua" placeholder="id ve" value="<?php echo $_POST["ho_ten_nguoi_mua"]; ?>" readonly />

			<label for="gia_ve">Giá vé hoàn trả:</label>
			<input name="gia_ve" style="color:black; background-color: white;" type="text" class="form-control" id="gia_ve" placeholder="id ve" value="<?php echo number_format((($_POST["gia_ve"]*30)/100),0,",",".") , " VNĐ"; ?>" readonly />
		</div>

		<input type="submit" class="btn btn-info" name="huy_ve" value="Hủy vé" />

		<button class="btn btn-warning"><a style="color:white;" href="index.php?task=danh_sach_ve_phim">Quay lại</a></button>
	</form>
	</div>
	<?php
	}
	else 
	{
		echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
	}
	?>