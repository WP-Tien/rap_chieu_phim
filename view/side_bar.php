 <div class="col-sm-12 col-md-3 col-lg-3 col-md-offset-1 col-lg-offset-1">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tieu-de-dat-ve text-left" style="padding-top:10px; padding-bottom: 10px;">
            ĐẶT VÉ ONLINE
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <form action="index.php?task=tdv" method="POST">
                    <div class="wrap-select">
                        <select name="id_rap_phim" class="form-control" id="chon-rap" style="height:40px; margin-top: 10px;">
                <option>--Chọn rạp--</option>
                <?php
                    foreach($ds_rap_chieu as $rap_chieu)
                    {
                ?>
                        <option value="<?php echo $rap_chieu->id;?>"><?php echo $rap_chieu->ten_rap_chieu; ?></option>
                <?php
                    }
                ?>
              </select>

                        <select name="id_phim" disabled="disabled" class="form-control" id="chon-phim" style="height:40px; margin-top: 10px;">
                <option value="">--Chọn phim--</option>
              </select>

                        <select name="id_ngay" disabled="disabled" class="form-control" id="chon-ngay" style="height:40px; margin-top: 10px;">
                <option value="">--Chọn ngày--</option>
              </select>

                        <select name="id_suat" disabled="disabled" class="form-control" id="chon-suat" style="height:40px; margin-top: 10px;">
                <option value="">--Chọn suất--</option>
              </select>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wrap-nut-dat-ve text-center">
                            <input type="submit" value="Đặt vé" class="nut-dat-ve" style="    padding: 8px;" />
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tieu-de-dat-ve text-left" style="padding-top:10px; padding-bottom: 10px; margin-top: 50px; margin-bottom: 15px;">
            PHIM ĐANG CHIẾU
        </div>

        <div style="clear:both;"></div>
        <div style="margin:5px 0;" class="side-pdc">
            <ul style="padding:0;">
                <?php
                    foreach($ds_phim_dang_chieu as $phim_dang_chieu)
                    {
                ?>
                <li>
                    <a href="index.php?task=tct&id=<?php echo $phim_dang_chieu->id; ?>">
              <img src="images/phim/<?php echo $phim_dang_chieu->poster; ?>" class="img-responsive" alt="Image" style="margin:0 auto; width: 100%;">
            </a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</div>