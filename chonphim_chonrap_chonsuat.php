<ul class="content-1">
    <li id="title-1">
        CHỌN PHIM 
    </li>                                                   
</ul>
<ul class="content-2">
    <li id="title-2">
        CHỌN RẠP
    </li>                            
</ul>
<ul class="content-3">
    <li id="title-3">
        CHỌN SUẤT
    </li>                               
</ul>

<script>
    $(function() {
        $.ajax({
            url: "xu_ly_dat_ve_phim.php?task=ds_phim_dang_chieu",
            type: "POST",
            data: { tag: 'phim'},
            success: function(data){

            ds_phim = $.parseJSON(data);
            //console.log(ds_phim);

            var chuoi = "<li>  CHỌN PHIM </li>"; 
            $.each(ds_phim, function(index, value){
                chuoi += '<li id="'+value.id+'">'+value.ten_phim+'</li>';
            });
            if(chuoi)
            {
                $('.content-1').html(chuoi); 

                $('.content-1 li').click(function() {
                // alert(this.id); // id of clicked li by directly accessing DOMElement property
                // alert($(this).attr('id')); // jQuery's .attr() method, same but more verbose
                // alert($(this).html()); // gets innerHTML of clicked li
                // alert($(this).text()); // gets text contents of clicked li
                
                id_phim = $(this).attr('id');

                $.ajax({
                        url: "xu_ly_dat_ve_phim.php?task=ds_rap_chieu_theo_phim",
                        type: "POST",
                        data: { id_phim: id_phim },
                        success: function(data){

                        ds_rap = $.parseJSON(data);
                        //console.log(ds_rap);

                        var chuoi_rap = "<li>  CHỌN RẠP</li>"; 

                        $.each(ds_rap, function(index, value){
                            chuoi_rap += '<li id="'+value.id+'">'+value.ten_rap_chieu+'</li>';
                            //console.log(chuoi);
                        });
                            if(chuoi_rap)
                            {
                                $('.content-2').html(chuoi_rap); 

                                $('.content-2 li').click(function() {   
                                    id_rap_phim = $(this).attr('id');
                                    // console.log(id_rap_phim);
                                    // console.log(id_phim);
                                    $.ajax({
                                        url: "xu_ly_dat_ve_phim.php?task=ds_suat_chieu",  
                                        type: "POST",
                                        data: { id_phim: id_phim, id_rap: id_rap_phim },
                                        success: function(data){
                                            
                                            ds_ngay_gio = $.parseJSON(data);
                                            //console.log(data);
                                            var chuoi_suat = "<li>  CHỌN SUẤT</li>"; 
                                            
                                            $.each(ds_ngay_gio, function(index, value){
                                                chuoi_suat += '<li id="'+value.id+'"><form action="index.php?task=tdv" method="POST"><input type="hidden" name="id_suat" value="'+value.id+'"><input type="hidden" name="id_phim" value="'+id_phim+'"><input type="hidden" name="id_rap_phim" value="'+id_rap_phim+'"><input type="hidden" name="id_ngay" value="'+value.ngay+'">'+value.ngay+' '+value.gio_chieu+'<input type="submit" value="" /></form></li>';
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