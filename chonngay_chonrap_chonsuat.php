<ul class="content-1">
    <li id="title-1">
    CHỌN NGÀY
    </li>                                                   
</ul>
<ul class="content-2">
    <li id="title-2">
     CHỌN RẠP
    </li>                            
</ul>
<ul class="content-3">
    <li id="title-3">
     CHỌN PHIM
    </li>                               
</ul>

<script>
    $(function() {
        $.ajax({
            url: "xu_ly_dat_ve_phim.php?task=danh_sach_ngay_chieu_co_phim_dang_chieu",
            type: "POST",
            data: { tag: 'suat'},
            success: function(data){

            ds_suat = $.parseJSON(data);
            //console.log(ds_suat);
            var chuoi = "<li>  CHỌN SUẤT </li>"; 
            $.each(ds_suat, function(index, value){
                chuoi += '<li id="'+value.ngay+'">'+value.ngay+'</li>';
            });
            if(chuoi)
            {
                $('.content-1').html(chuoi); 

                $('.content-1 li').click(function() {
                id_ngay = $(this).attr('id');
                //console.log(id_ngay);
                $.ajax({
                        url: "xu_ly_dat_ve_phim.php?task=danh_sach_rap_theo_ngay",
                        type: "POST",
                        data: { id_ngay: id_ngay },
                        success: function(data){
                        ds_rap = $.parseJSON(data);

                        var chuoi_rap = "<li>  CHỌN RẠP</li>"; 

                        $.each(ds_rap, function(index, value){
                            chuoi_rap += '<li id="'+value.id+'">'+value.ten_rap_chieu+'</li>';
                        });
                            if(chuoi_rap)
                            {
                                $('.content-2').html(chuoi_rap); 

                                $('.content-2 li').click(function() {   
                                    id_rap_phim = $(this).attr('id');
                                      // console.log(id_rap_phim);
                                      // console.log(id_ngay);
                                    $.ajax({
                                        url: "xu_ly_dat_ve_phim.php?task=danh_sach_phim_gio_chieu_theo_ngay_va_rap",  
                                        type: "POST",
                                        data: { id_ngay: id_ngay, id_rap_phim: id_rap_phim },
                                        success: function(data){
                                            
                                            ds_ngay_gio = $.parseJSON(data);
                                            console.log(ds_ngay_gio);
                                            var chuoi_suat = "<li>  CHỌN PHIM </li>"; 
                                            
                                            $.each(ds_ngay_gio, function(index, value){
                                                chuoi_suat += '<li id="'+value.id+'"><form action="index.php?task=tdv" method="POST"><input type="hidden" name="id_suat" value="'+value.id_suat+'"><input type="hidden" name="id_phim" value="'+value.id+'"><input type="hidden" name="id_rap_phim" value="'+id_rap_phim+'"><input type="hidden" name="id_ngay" value="'+value.ngay_khoi_chieu+'">'+value.ten_phim+' '+value.gio_chieu+'<input type="submit" value=""/></form></li>';
                                            });

                                            $('.content-3').html(chuoi_suat); 

                                        }
                                    });
                                });
                            } // if chuoi rap
                        }//success
                    }); // end xu ly 2           
                });
            } // if chuoi
          } //success
        }); // end xu ly 1
    });
</script> 