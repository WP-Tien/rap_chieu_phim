<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="page-header">
          <h2><a href="index.php" style="color: #555; text-decoration: none;">Trang chủ ></a><small style="color:#fcb040"> SỰ KIỆN </small></h2>
        </div>
    </div>
</div>

<?php 
$so_luong_hien_thi = 8;
$so_trang =  ceil(count($ds_su_kien)/$so_luong_hien_thi);
if($_GET["page"])
{
	$trang_hien_tai = $_GET["page"];
}
else
{
	$trang_hien_tai = 1;
}

//echo count($ds_binh_luan);

$ds_su_kien_hien_thi = $this->model_binh_luan->lay_ds_su_kien_hien_thi(($trang_hien_tai -1) * $so_luong_hien_thi, $so_luong_hien_thi);

// echo "<pre>";
// print_r($so_trang);
// echo "</pre>";



?>


<div class="container">
	<div class="col-sm-12 col-md-8 col-lg-8">
	<?php
		foreach($ds_su_kien_hien_thi as $su_kien)
		{
	?>
	<div class="col-sm-12 col-md-12 col-lg-12" style="margin-top:40px; color:#555;">
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<img src="images/su-kien/<?php echo $su_kien->hinh_bai_viet; ?>" class="img-responsive" alt="Image" style="box-shadow: 0 0 8px black">
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<a href="?task=ctsk&id_sk=<?php echo $su_kien->id; ?> ">
				<div class="tieu_de_tin" style="color: #fcb040; font-size: 20px; font-weight: bold; border-bottom: 2px solid #fcb040;">
					<?php echo $su_kien->tieu_de;?>
				</div>
			</a>
			<div class="mo_ta_tom_tat" style="margin-top: 10px; font-size: 15px;">
				<?php echo $su_kien->mo_ta_tom_tat; ?>
			</div>
			<a href="#" style="color: #555; font-size: 15px;">Xem thêm >></a>
		</div>
	</div>	
	<?php 
		}
	?>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: right;">
			<?php
			echo $phan_trang->pageList($trang_hien_tai,$so_trang);
			?>
		</div>
	
	</div>