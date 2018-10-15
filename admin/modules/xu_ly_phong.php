<?php
if($_POST["cap_nhat"] || $_POST["cap_nhat_phong"])
{
	?>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4">
		<form action="" method="POST" >
		<legend style="color:black;">Cập nhật phòng</legend>

		<div class="form-group">
			<label for="id">ID: </label>
			<input name="id" style="color:black; background-color: white;" type="text" class="form-control" id="id" value="<?php echo $_POST["id"]; ?>" readonly  />		

			<label for="ten_phong_chieu">Tên phòng:</label>
			<input name="ten_phong_chieu" style="color:black; background-color: white;" type="text" class="form-control" id="ten_phong_chieu"  value="<?php echo $_POST["ten_phong_chieu"]; ?>"/>	

			<label for="so_ghe">Số ghế:</label>
			<input name="so_ghe"style="color:black; background-color: white;" type="text" class="form-control" id="so_ghe" value="<?php echo $_POST["so_ghe"]; ?>" />

			<label for="trang_thai">Trạng thái:</label>
			<input name="trang_thai" style="color:black; background-color: white;" type="text" class="form-control" id="trang_thai" value="<?php echo $_POST["trang_thai"]; ?>" />

			<label for="so_hang_cot">Số hàng - cột:</label>
			<input name="so_hang_cot" style="color:black; background-color: white;" type="text" class="form-control" id="so_hang_cot" value="<?php echo $_POST["so_hang_cot"]; ?>" />

			<label for="loi_di">Lối đi:</label>
			<input name="loi_di" style="color:black; background-color: white;" type="text" class="form-control" id="loi_di" value="<?php echo $_POST["loi_di"]; ?>" />

			<label for="quan_tri_rap">Quản trị rạp:</label>

			<select name="quan_tri_rap" class="form-control">
			<?php 
				foreach ($ds_rap as $rap) {
			?>
			<option style="color:black; background-color: white;" value="<?php echo $rap->id ;?>"><?php echo $rap->ten_rap_chieu ;?></option>
			<?php
			}
			?>
			</select>


		</div>

		<input type="submit" class="btn btn-info" name="cap_nhat_phong" value="Cập nhật" />
		<button class="btn btn-warning"><a style="color:white;" href="index.php?task=danh_sach_phong_chieu">Quay lại</a></button>
	</form>
	</div>
	<?php
}
else if($_POST["xoa"])
{
	//print_r($_POST);
	echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
}
else 
{
	echo "<script>window.location = '" . $_SERVER["HTTP_REFERER"] . "'</script>";
}
?>