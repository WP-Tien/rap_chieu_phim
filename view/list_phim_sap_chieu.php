<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="page-header">
          <h2><a href="index.php" style="color: #555; text-decoration: none;">Trang chủ ></a><small style="color:#fcb040"> <a href="index.php?task=pdc" style="color: #fcb040; text-decoration: none;">PHIM SẮP CHIẾU </a> | <b><a href="index.php?task=psc" style="color: #fcb040; text-decoration: none;">PHIM SẮP CHIẾU </a></b> </small></h2>
        </div>
    </div>
</div>

<?php 
if($ds_phim_sap_chieu)
{
    $so_luong_hien_thi = 12;

    $so_trang =  ceil(count($ds_phim_sap_chieu)/$so_luong_hien_thi);

    if($_GET["page"])
    {
        $trang_hien_tai = $_GET["page"];
    }
    else
    {
        $trang_hien_tai = 1;
    }
    $ds_phim_sap_chieu_hien_thi = $this->model_phim->lay_ds_phim_sap_chieu_hien_thi(($trang_hien_tai -1) * $so_luong_hien_thi, $so_luong_hien_thi);
}
else
{
    //print_r($_POST["id_loai_phim"]);
    $so_luong_hien_thi = 12;

    $so_trang =  ceil(count($ds_phim_sap_chieu_theo_loai)/$so_luong_hien_thi);

    //print_r($so_trang);

    if($_GET["page"])
    {
        $trang_hien_tai = $_GET["page"];
    }
    else
    {
        $trang_hien_tai = 1;
    }
    $ds_phim_sap_chieu_hien_thi_theo_loai = $this->model_phim->lay_ds_phim_sap_chieu_hien_thi_theo_loai(($trang_hien_tai -1) * $so_luong_hien_thi, $so_luong_hien_thi, $_POST["id_loai_phim"]);
    
    //print_r($ds_phim_sap_chieu_hien_thi_theo_loai);

    if(!$ds_phim_sap_chieu_theo_loai)
    {
       $alert = "<div class='container' style='color:red; padding-bottom: 250px;'><h3> Hiện tại không có phim theo loại này.</h3></div>";
    }
}



?>

<div class="container">

       <form action="index.php?task=psc" method="POST">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
       <select name="id_loai_phim" class="form-control" id="chon-loai" style="color: orange; font-weight: bold;">
        <option>--Chọn thể loại--</option>
        <?php
            foreach($ds_loai_phim as $loai)
            {
        ?>
                <option value="<?php echo $loai->id;?>"><?php echo $loai->ten_loai_phim; ?></option>
        <?php
            }
        ?>
        </select>      
        </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <input style="border: 0; background-color: #fcb040;color: white;font-weight: bold;padding: 6px;width: 50px;border-radius: 5px;" type="submit" value="Lọc" name="lay_loai_phim"/>
            </div>
        </form>  

</div>

<?php 
if($ds_phim_sap_chieu_hien_thi)
{
?>
<div class="container">
    <div class="row">
    <?php
        for($i = 0; $i < count($ds_phim_sap_chieu_hien_thi); $i++)
        {
        ?>
        <a href="index.php?task=tct&id=<?php echo $ds_phim_sap_chieu_hien_thi[$i]->id; ?>">
        <div class="col-sm-3 col-md-3 col-lg-3 wrap-hinh-sp" style="margin-top:40px; color:#555;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <img src="images/phim/<?php echo $ds_phim_sap_chieu_hien_thi[$i]->poster; ?>" class="img-responsive hinh-anh-sp" alt="Image" style="box-shadow: 0 0 8px black">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tieu-de-sp" style="padding: 15px;">
                <?php echo $ds_phim_sap_chieu_hien_thi[$i]->ten_phim; ?>
            </div>
        </div>  
        </a>
    <?php 
        if($i % 4 == 3)
        {
            ?>
                <div style="clear:both;"></div>
            <?php
        }
        }
    ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: right;">
            <?php
            echo $phan_trang->pageList($trang_hien_tai,$so_trang);
            ?>
        </div>
    </div>
</div>

<?php
}
    else{
?>


<div class="container">
    <div class="row">
    <?php
        for($i = 0; $i < count($ds_phim_sap_chieu_hien_thi_theo_loai); $i++)
        {
        ?>
        <a href="index.php?task=tct&id=<?php echo $ds_phim_sap_chieu_hien_thi_theo_loai[$i]->id; ?>">
        <div class="col-sm-3 col-md-3 col-lg-3 wrap-hinh-sp" style="margin-top:40px; color:#555;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <img src="images/phim/<?php echo $ds_phim_sap_chieu_hien_thi_theo_loai[$i]->poster; ?>" class="img-responsive hinh-anh-sp" alt="Image" style="box-shadow: 0 0 8px black">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tieu-de-sp" style="padding: 15px;">
                <?php echo $ds_phim_sap_chieu_hien_thi_theo_loai[$i]->ten_phim; ?>
            </div>
        </div>  
        </a>
    <?php 
        if($i % 4 == 3)
        {
            ?>
                <div style="clear:both;"></div>
            <?php
        }
        }
    ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: right;">
            <?php
            echo $phan_trang->pageList($trang_hien_tai,$so_trang);
            ?>
        </div>
    </div>
</div>

<?php    

echo $alert;
    }
?>