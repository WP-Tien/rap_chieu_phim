<?php 
    include_once("controller/c_trang_chu.php");
    $controller = new c_trang_chu();
    $ds_phim_dang_chieu = $controller->ds_phim_dang_chieu();

    //echo "<pre>", print_r($ds_phim_dang_chieu) ,"</pre>";
?>
<div class="container cac-san-pham">
<ul>
    <?php 
    foreach($ds_phim_dang_chieu as $pdc)
    {
    ?>
    <li>
        <a href="?task=tct&id=<?php echo $pdc->id; ?>">
            <div class="wrap-hinh-sp">
                <img src="images/phim/<?php echo $pdc->poster; ?>" class="img-responsive hinh-anh-sp">
                <div class="wrap-mua-ve">
                    <div class="wrap-content">
                        <p>Mua vé</p>
                        <p>Chi tiết</p>
                    </div>
                </div>
            </div>
            <div class="tieu-de-sp"> <?php echo $pdc->ten_phim; ?> </div>
        </a>
    </li>
    <?php 
    }
    ?>
</ul>
</div>

    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/cac-san-pham.js"></script>