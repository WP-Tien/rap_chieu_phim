<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-lg-offset-4">
	<form action="" method="POST" >
	<legend style="color:black;">Thêm phòng</legend>

	<div class="form-group">		
		<label for="ten_phong_chieu">Tên phòng chiếu:</label>
		<input name="ten_phong_chieu" style="color:black; background-color: white;" type="text" class="form-control" id="ten_phong_chieu"  value=""/>	

		<label for="so_ghe">Số ghế:</label>
		<input name="so_ghe" style="color:black; background-color: white;" type="text" class="form-control" id="so_ghe" value="" />

		<label for="trang_thai">Trạng thái:</label>
		<input name="trang_thai"style="color:black; background-color: white;" type="text" class="form-control" id="trang_thai" value="" />

		<label for="hang_cot">Số hàng cột:</label>
		<input name="hang_cot" style="color:black; background-color: white;" type="text" class="form-control" id="hang_cot" value="" />

		<label for="loi_di">Lối đi:</label>
		<input name="loi_di" style="color:black; background-color: white;" type="text" class="form-control" id="loi_di" value="" />

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

	<input type="submit" class="btn btn-info" name="them_phong" value="Thêm" />
	<button class="btn btn-warning"><a style="color:white;" href="index.php?task=danh_sach_phong_chieu">Quay lại</a></button>
</form>
</div>