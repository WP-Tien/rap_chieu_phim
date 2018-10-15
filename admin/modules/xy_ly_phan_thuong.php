<?php 
if($_POST["doi_phan_thuong"])
{
?>
<h2 style="color: black;">Điểm hiện tại của <?php echo $_POST["ho_ten"]; ?> là <span id="tong_diem" data-total="<?php echo $_POST["diem_tich_luy"]; ?>"><?php echo $_POST["diem_tich_luy"]; ?></span> </h2>

<p id="tongdiem"></p>

<form action="index.php?task=xy_ly_phan_thuong" method="post">
	<input type="hidden" name="user" value="<?php echo $_POST["id"]; ?>" />
	<input id="diemqua" type="hidden" name="diemqua" value="<?php echo $_POST["id"]; ?>" />
	<select name="phanthuong" class="phanthuong">
		<option>Chọn phần thưởng</option>
		<?php
			foreach($danh_sach_qua as $qua)
			{
		?>
		<option value="<?php echo $qua->id ;?>"><?php echo $qua->ten_qua ;?></option>
		<?php 
			}
		?>
	</select>
	<select name="soluong" id="soluong">
		<option >Chọn số lượng</option>
	</select>
	<input type="submit" value="Xác nhận" id="xac_nhan" name="xac_nhan"/>
</form>

<script>
	$(function() {
		$('.phanthuong').change(function() {
			//alert($('.phanthuong').val());
            $.post("../xu_ly_admin.php?task=xl_so_luong",{phan_thuong: $('.phanthuong').val()}).success(function(data){
	        
	        diem = $.parseJSON(data);
	        tong_diem = $('#tong_diem').attr("data-total");

	        soluong = Math.floor(tong_diem / diem.gia_tri_diem);
	        chuoi = "<option>Chọn số lượng</option>";

	        // console.log(soluong);
	        // console.log(diem.gia_tri_diem);
	        for(var i=1; i <= soluong; i++)
	        {
	        	 chuoi += '<option value="' + i + '" data-value="' + i*diem.gia_tri_diem + '">' + i + '</option>'
	        }

	        $("#diemqua").val(diem.gia_tri_diem);
            $("#soluong").html(chuoi);

			});
		});

	});
</script>
<?php
}
else {
	echo "<script>window.location = 'index.php?task=doi_phan_thuong_khach'; </script>";
}
?>