<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4">
	<form action="" method="POST" >
	<legend style="color:black;">Thêm lịch chiếu</legend>

	<div class="form-group">		
		<label for="chon_phim">Chọn phim:</label>
		<select name="chon_phim" class="form-control">
		<option style="color:black; background-color: white;">--Chọn phim--</option>
		<?php 
			foreach ($danh_sach_phim_dang_chieu as $phim) {
		?>
		<option style="color:black; background-color: white;" value="<?php echo $phim->id ;?>"><?php echo $phim->ten_phim ;?></option>
		<?php
		}
		?>
		</select> 

		<label for="chon_phong">Chọn phòng:</label>
		<select name="chon_phong" class="form-control">
		<option style="color:black; background-color: white;">--Chọn Phòng--</option>
		<?php 
			foreach ($lay_phong_theo_rap as $phong) {
		?>
		<option style="color:black; background-color: white;" value="<?php echo $phong->id ;?>"><?php echo $phong->ten_phong_chieu ;?></option>
		<?php
		}
		?>
		</select> 

		<label for="ngay_gio_chieu">Chọn ngày giờ chiếu:</label>
		<input name="ngay_gio_chieu" style="color:black; background-color: white;" type="datetime-local" class="form-control" id="ngay_gio_chieu" value="<?php echo $_POST["ngay_gio_chieu"]; ?>" />

	</div>

	<input type="submit" class="btn btn-info" name="them_lich" value="Thêm" />
	<button class="btn btn-warning"><a style="color:white;" href="index.php?task=danh_sach_lich_chieu">Quay lại</a></button>
</form>
</div>