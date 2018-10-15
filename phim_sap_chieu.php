<?php 
    include_once("controller/c_trang_chu.php");
    $controller = new c_trang_chu();
    $ds_phim_sap_chieu = $controller->ds_phim_sap_chieu();
?>
<div class="container cac-san-pham">
<ul>
    <?php 
    foreach($ds_phim_sap_chieu as $psc)
    {
    ?>
    <li>
        <a href="?task=tct&id=<?php echo $psc->id; ?>">
            <div class="wrap-hinh-sp">
                <img src="images/phim/<?php echo $psc->poster; ?>" class="img-responsive hinh-anh-sp">
                <div class="wrap-mua-ve">
                    <div class="wrap-content">
                        <p>Mua vé</p>
                        <p>Chi tiết</p>
                    </div>
                </div>
            </div>
            <div class="tieu-de-sp"> <?php echo $psc->ten_phim; ?> </div>
        </a>
    </li>
    <?php 
    }
    ?>
</ul>
</div>

    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/cac-san-pham.js"></script>