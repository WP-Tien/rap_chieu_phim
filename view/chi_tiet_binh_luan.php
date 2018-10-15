<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="page-header">
            <h2><a href="index.php" style="color: #555; text-decoration: none;">TRANG CHỦ ></a><small style="color:#fcb040"> BÌNH LUẬN </small></h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-sm-12 col-md-8 col-lg-8" style="color:#555;">
        <h2>
            <?php echo $chi_tiet_bl->tieu_de; ?>
        </h2>

        <p style="font-size: 18px; padding: 10px 0;">
            <?php echo $chi_tiet_bl->mo_ta_tom_tat; ?>
        </p>

        <img src="images/binh-luan/<?php echo $chi_tiet_bl->hinh_bai_viet; ?>" class="img-responsive" alt="Image" style="margin: 0 auto; padding: 10px 0;">

        <p style="font-size: 18px; padding: 10px 0;">
            <?php echo $chi_tiet_bl->mo_ta_chi_tiet; ?>
        </p>


        <div class="row">
            <a href="index.php?task=bl">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 tieu-de-cac-sp text-left">
                    BÌNH LUẬN MỚI NHẤT
                </div>
            </a>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="binh_luan_lien_quan" style="margin-top: 20px; ">
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
                                    <div class="tieu-de-km"> <i class="fa fa-calendar" aria-hidden="true" style="font-size: 20px; color: #cd190b;"></i>
                                        <?php 
                                    $date = date($binh_luan->ngay_dang);
                                    $date = date_create($date);
                                    echo date_format($date,"d/m/Y H:i:s");
                                    ?> </div>
                                </a>
                            </li>
                            <?php 
                                    }
                                ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="fb-comments" data-href="https://www.facebook.com/Englishnht/" data-width="760" data-numposts="5"></div>
                <div id="fb-root"></div>
                <script>
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=831364466912407';
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
            </div>


        </div>

    </div>


   