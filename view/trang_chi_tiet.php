<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="page-header">
          <h2><a href="index.php" style="color: #555; text-decoration: none;">Trang chủ ></a><small style="color:#fcb040"> Trang chi tiết phim </small></h2>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 30px">
<div class="col-sm-12 col-md-8 col-lg-8">
<?php 
    if ($chi_tiet_phim_theo_id)
    {
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" style="margin-top: 10px">
        <img src="images/phim/<?php echo $chi_tiet_phim_theo_id->poster; ?>" class="img-responsive hinh-anh-chi-tiet" alt="Image">
    </div>

    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" style="margin-top: 10px">
        <div class="tieu-de-phim"><?php echo $chi_tiet_phim_theo_id->ten_phim; ?></div>
        
        <div class="thong-tin-phim">
            <div class="noi-dung-phim"><?php echo $chi_tiet_phim_theo_id->gioi_thieu; ?></div>
            <div><span>Đạo diễn: </span><?php echo $chi_tiet_phim_theo_id->ten_dao_dien; ?></div>
            <div><span>Nhà sản xuất: </span><?php echo $chi_tiet_phim_theo_id->ten_nha_san_xuat; ?></div>
            <div><span>Diễn viên:</span> <?php 
            foreach ($lay_ds_dien_vien_theo_id_phim as $dien_vien){
            echo $dien_vien->ten_dien_vien,", "; 
            }
            ?></div>
            <div><span>Thể loại:</span> <?php 
                foreach ($lay_ds_loai_phim_theo_id_phim as $loai_phim)
                {
                    echo $loai_phim->ten_loai_phim,", ";
                }
            ?>
            </div>
            <div><span>Khởi chiếu:</span> <?php echo $chi_tiet_phim_theo_id->ngay_gio_chieu; ?></div>
            <div><span>Thời lượng: </span> <?php echo $chi_tiet_phim_theo_id->do_dai_phim; ?> phút</div>

        </div>
        <div id="nut-dat-ve" class="col-xs-4 col-sm-4 col-md-4 col-lg-4 nut-dat-ve text-center" style="box-shadow: 1px 1px 1px #999; margin-top: 30px; border-radius: 4px; width: 200px; height: 30px; font-size: 14px; padding: 5px;">
            ĐẶT VÉ 
        </div>
    </div>      
</div>
<?php
}
else {
?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wrap-noi-dung-chi-tiet">
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" style="margin-top: 10px">
        <img src="images/phim/<?php echo $lay_phim_theo_id_ko_lc->poster; ?>" class="img-responsive hinh-anh-chi-tiet" alt="Image">
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6  col-md-offset-1 col-lg-offset-1" style="margin-top: 10px">
        <div class="tieu-de-phim"><?php echo $lay_phim_theo_id_ko_lc->ten_phim; ?></div>
        
        <div class="thong-tin-phim">
            <div class="noi-dung-phim"><?php echo $lay_phim_theo_id_ko_lc->gioi_thieu; ?></div>
            <div><span>Đạo diễn: </span><?php echo $lay_phim_theo_id_ko_lc->ten_dao_dien; ?></div>
            <div><span>Nhà sản xuất: </span><?php echo $lay_phim_theo_id_ko_lc->ten_nha_san_xuat; ?></div>
            <div><span>Diễn viên:</span> <?php 
            foreach ($lay_ds_dien_vien_theo_id_phim as $dien_vien){
            echo $dien_vien->ten_dien_vien,", "; 
            }
            ?></div>
            <div><span>Thể loại:</span> <?php 
                foreach ($lay_ds_loai_phim_theo_id_phim as $loai_phim)
                {
                    echo $loai_phim->ten_loai_phim,", ";
                }
            ?>
            </div>
            <div><span>Khởi chiếu:</span> <?php echo $lay_phim_theo_id_ko_lc->ngay_khoi_chieu; ?></div>
            <div><span>Thời lượng: </span> <?php echo $lay_phim_theo_id_ko_lc->do_dai_phim; ?> phút</div>

        </div>
    </div>      
</div>

   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:50px;">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <div class="fb-comments" data-href="https://www.facebook.com/Englishnht/" data-width="300" data-numposts="5"></div>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=831364466912407';
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            </div>            
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-lg-offset-2">
                <div class="video-responsive">
                <iframe width="560" height="315" src="<?php echo $lay_phim_theo_id_ko_lc->trailer; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
    </div>  

<?php 
    }
    if($lay_ds_rap_theo_id)
    {
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 150px">
    <div id="lich-chieu" class="col-lg-12 text-left" style="font-size: 30px; font-weight: bold;">
        LỊCH CHIẾU
    </div>
    
    <?php foreach($lay_ds_rap_theo_id as $rap)
    {
    ?>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div style="margin-top:30px;">

                <div class="col-lg-3 dia-diem-rap">
                    <div class="ten-rap"><?php echo $rap->ten_rap_chieu; ?></div>
                    <div class="noi-dung-dia-diem"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $rap->dia_chi; ?></div>
                </div>


            <div class="col-lg-7 col-lg-offset-2">
                <?php
                include_once("model/model_phim.php");
                $model_phim = new xl_phim();
                $danh_sach_ngay_gio = $model_phim->danh_sach_ngay_gio($rap->id ,$_GET["id"]);

                // echo "<pre>", print_r($danh_sach_ngay_gio) , "</pre>";
                foreach ($danh_sach_ngay_gio as $gio)
                {
                ?>
                <form action="index.php?task=tdv" method="post">
                    <input type="hidden" name="id_suat" value="<?php echo $gio->id; ?>" />
                    <input type="hidden" name="id_phim" value="<?php echo  $chi_tiet_phim_theo_id->id; ?>" />
                    <input type="hidden" name="id_rap_phim" value=" <?php echo $rap->id; ?>" />
                    <input type="hidden" name="id_ngay" value="<?php echo $gio->ngay;?>" />
                    <input class="gio-chieu-phim" type="submit" value="<?php echo $gio->gio_chieu, " ", $gio->ngay; ?>">
                </form>
                <?php
                }
                ?>
            </div>
        </div>         
      
    </div>
    <?php
    } 
    ?>

   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:50px;">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <div class="fb-comments" data-href="https://www.facebook.com/Englishnht/" data-width="300" data-numposts="5"></div>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=831364466912407';
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            </div>            
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-lg-offset-2">
                <div class="video-responsive">
                <iframe width="560" height="315" src="<?php echo $chi_tiet_phim_theo_id->trailer; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
    </div>   


</div>

<?php
    }
?>

</div>