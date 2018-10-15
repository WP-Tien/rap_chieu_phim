<?php
if($_POST["cap_nhat"] || $_POST["cap_nhat_admin"])
{
	?>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4">
		<form action="" method="POST" >
		<legend style="color:black;">Cập nhật admin</legend>

		<div class="form-group">
			<label for="id">ID: </label>
			<input name="id" style="color:black; background-color: white;" type="text" class="form-control" id="id" value="<?php echo $_POST["id"]; ?>" readonly  />		

			<label for="username">User name:</label>
			<input name="username" style="color:black; background-color: white;" type="text" class="form-control" id="username"  value="<?php echo $_POST["username"]; ?>" readonly/>	

			<label for="email">Email:</label>
			<input name="email"style="color:black; background-color: white;" type="text" class="form-control" id="email" value="<?php echo $_POST["email"]; ?>" />

			<label for="ho_ten">Họ tên:</label>
			<input name="ho_ten" style="color:black; background-color: white;" type="text" class="form-control" id="ho_ten" value="<?php echo $_POST["ho_ten"]; ?>" />

			<label for="password">Password:</label>
			<input name="password" style="color:black; background-color: white;" type="password" class="form-control" id="Password" placeholder="Nhập password" value="" />

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

		<input type="submit" class="btn btn-info" name="cap_nhat_admin" value="Cập nhật" />
		<button class="btn btn-warning"><a style="color:white;" href="index.php?task=danh_sach_admin">Quay lại</a></button>
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