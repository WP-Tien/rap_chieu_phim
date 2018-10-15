    <div class="container text-left" style="margin-top: 30px;">
        <div class="col-sm-12 col-md-12 col-lg-3 tieu-de-cac-sp">
              <a href="index.php?task=sk">SỰ KIỆN</a>
        </div>
    </div>
    
    <div class="container">
            <div class=" su-kien" style="margin-top: 10px">
                <ul>   
                    <?php 
                        foreach($ds_su_kien_moi_nhat as $su_kien)
                        {
                    ?>
                    <li>
                        <a href="?task=ctsk&id_sk=<?php echo $su_kien->id; ?>">
                            <div class="wrap-hinh-sp">
                                <img src="images/su-kien/<?php echo $su_kien->hinh_bai_viet; ?>" class="img-responsive hinh-anh-sp">
                                <div class="wrap-mua-ve">
                                    <div class="wrap-content">
                                        <p>Chi tiết</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tieu-de-sp"><i class="fa fa-calendar" aria-hidden="true" style="font-size: 20px; color: #cd190b;"></i> 
                                    <?php 
                                    $date = date($su_kien->ngay_dang);
                                    $date = date_create($date);
                                    echo date_format($date,"d/m/Y H:i:s");
                                    ?></div>
                        </a>     
                    </li>
                    <?php 
                        }
                    ?>
                </ul>  
    </div>
</div>