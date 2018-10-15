        <div class="container" style="margin-top: 30px">
        <div class="col-sm-12 col-md-7 col-lg-7">
            <div class="row">
                <a href="index.php?task=bl">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 tieu-de-cac-sp text-left">
                    BÌNH LUẬN
                </div>
                </a>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="binh-luan" style="margin-top: 20px; ">
                            <ul>
                                <?php 
                                    foreach($ds_binh_luan_moi_nhat as $binh_luan)
                                    {
                                ?>
                                <li>
                                    <a href="index.php?task=ctbl&id_bl=<?php echo $binh_luan->id; ?>">
                                    <div class="wrap-hinh-km">
                                        <img src="images/binh-luan/trang_chu/<?php echo $binh_luan->hinh_trang_chu;?>" class="img-responsive hinh-anh-km">
                                        <div class="wrap-mua-ve">
                                            <div class="wrap-content">
                                                <p>Xem chi tiết</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tieu-de-km"> <i class="fa fa-calendar" aria-hidden="true" style="font-size: 20px; color: #cd190b;"></i> <?php 
                                    $date = date($binh_luan->ngay_dang);
                                    $date = date_create($date);
                                    echo date_format($date,"d/m/Y H:i:s");
                                    ?>  </div>
                                    </a>
                                </li>      
                                <?php 
                                    }
                                ?>                                                    
                            </ul>
                        </div>  
                    </div>
                </div>
            </div>
        </div>