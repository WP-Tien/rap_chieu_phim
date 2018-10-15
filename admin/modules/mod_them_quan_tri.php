<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4">
	<form action="" method="POST" >
	<legend style="color:black;">Thêm admin</legend>

	<div class="form-group">		
		<label for="username">User name:</label>
		<input name="username" style="color:black; background-color: white;" type="text" class="form-control" id="username"  value=""/>	

		<label for="password">Password:</label>
		<input name="password" style="color:black; background-color: white;" type="password" class="form-control" id="Password" placeholder="Nhập password" value="" />

		<label for="email">Email:</label>
		<input name="email"style="color:black; background-color: white;" type="text" class="form-control" id="email" value="" />

		<label for="ho_ten">Họ tên:</label>
		<input name="ho_ten" style="color:black; background-color: white;" type="text" class="form-control" id="ho_ten" value="" />

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

	<input type="submit" class="btn btn-info" name="them_admin" value="Thêm" />
	<button class="btn btn-warning"><a style="color:white;" href="index.php?task=danh_sach_admin">Quay lại</a></button>
</form>
</div>