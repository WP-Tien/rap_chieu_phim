        <div class="col-sm-12 col-md-4 col-lg-4 col-md-offset-1 col-lg-offset-1">
            <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tieu-de-dat-ve text-left">
                        ĐẶT VÉ ONLINE
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                          <form action="index.php?task=tdv" method="POST">
                            <div class="wrap-select">
                              <select name="id_rap_phim" class="form-control" id="chon-rap">
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

                              <select name="id_phim" disabled="disabled" class="form-control" id="chon-phim">
                                <option value="">--Chọn phim--</option>
                              </select> 

                              <select name="id_ngay" disabled="disabled"  class="form-control" id="chon-ngay">
                                <option value="">--Chọn ngày--</option>
                              </select>
                                
                              <select name="id_suat" disabled="disabled"  class="form-control" id="chon-suat">
                                <option value="">--Chọn suất--</option>
                              </select>

                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 wrap-nut-dat-ve text-center">
                                  <input type="submit" value="Đặt vé" class="nut-dat-ve"/>
                              </div>
                              
                            </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
</div>