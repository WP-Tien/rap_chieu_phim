<?php
if($_POST["cap_nhat"] || $_POST["cap_nhat_admin"])
{
	//print_r($_POST);
	?>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4">
		<form action="" method="POST" >
		<legend style="color:black;">Cập nhật rạp</legend>

		<div class="form-group">
			<label for="id">ID: </label>
			<input name="id" style="color:black; background-color: white;" type="text" class="form-control" id="id" value="<?php echo $_POST["id"]; ?>" readonly  />		

			<label for="ten_rap_chieu">Tên rạp:</label>
			<input name="ten_rap_chieu" style="color:black; background-color: white;" type="text" class="form-control" id="ten_rap_chieu"  value="<?php echo $_POST["ten_rap_chieu"]; ?>"/>	

			<label for="dia_chi">Địa chỉ:</label>
			<input name="dia_chi"style="color:black; background-color: white;" type="text" class="form-control" id="dia_chi" value="<?php echo $_POST["dia_chi"]; ?>" />

			<label for="so_dien_thoai">Số điện thoại:</label>
			<input name="so_dien_thoai" style="color:black; background-color: white;" type="text" class="form-control" id="so_dien_thoai" value="<?php echo $_POST["so_dien_thoai"]; ?>" />

		</div>

		<input type="submit" class="btn btn-info" name="cap_nhat_admin" value="Cập nhật" />
		<button class="btn btn-warning"><a style="color:white;" href="index.php?task=danh_sach_rap_phim">Quay lại</a></button>
	</form>
	</div>
	<?php
}
else if($_POST["xoa"])
{
	print_r($_POST);
	echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
}
else 
{
	echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
}
?>