  $(function() {
 
  // Đặt vé - Chon rap - xuat phim
    $('#chon-rap').change(function() {
        //alert($('#chon-rap').val());
        $.ajax({
          url: "xu_ly_dat_ve_phim.php?task=ds_phim",
          type: "POST",
          data: { id_rap_phim: $('#chon-rap').val()},
          success: function(data){
            //console.log(data);
              chuoi = "<option>--Chọn phim--</option>";
              //kp khong co phim
              ds_phim = $.parseJSON(data);
              //console.log(ds_phim);
              //foreach trong jquery
              $.each(ds_phim, function(index, value){
                chuoi += '<option value="'+value.id+'">'+value.ten_phim+'</option>';
                //console.log(flag);
              });
              //console.log(chuoi);
              if(chuoi && chuoi !== "<option>--Chọn phim--</option>")
              {
                $('#chon-phim').html(chuoi);
                $('#chon-phim').removeAttr("disabled");
              }
              else
              {
                $('#chon-phim').attr("disabled","disabled");
                $('#chon-ngay').attr("disabled","disabled");
                $('#chon-suat').attr("disabled","disabled");
                $('#chon-phim').html("<option>--Chọn phim--</option>");
                $('#chon-ngay').html("<option>--Chọn ngày--</option>");
                $('#chon-suat').html("<option>--Chọn suất--</option>");
              }

          }// success
        });
    });

  // Đặt vé - Chọn phim - xuat ngay
    $('#chon-phim').change(function() {
      // alert($('#chon-phim').val()); //lay id phim
      // alert($('#chon-rap').val()); //lay id rap
      $.ajax({
        url: 'xu_ly_dat_ve_phim.php?task=ds_ngay',
        type: 'POST',
        data: { id_rap_phim: $('#chon-rap').val(), id_phim: $('#chon-phim').val()},
        success: function(data){

          chuoi = "<option>--Chọn ngày--</option>";
          ds_ngay = $.parseJSON(data);
          //console.log(ds_ngay); 
          $.each(ds_ngay, function(index, value){
            chuoi += '<option value="'+value.ngay+'">'+value.ngay+'</option>';
            //console.log(flag);
          });
          //console.log(chuoi);
          if(chuoi && chuoi !== "<option>--Chọn ngày--</option>")
          {
              $('#chon-ngay').html(chuoi);
              $('#chon-ngay').removeAttr("disabled");   
              $('#chon-suat').attr("disabled","disabled");
              $('#chon-suat').html("<option>--Chọn suất--</option>");
          }
          else
          {         
              $('#chon-ngay').attr("disabled","disabled");
              $('#chon-suat').attr("disabled","disabled");
              $('#chon-ngay').html("<option>--Chọn ngày--</option>");
              $('#chon-suat').html("<option>--Chọn suất--</option>");
          }
          
        }// success
      });  
    });  

    // Đặt vé - Chọn ngay - xuat gio
    $('#chon-ngay').change(function() {
      // alert($('#chon-phim').val()); //lay id phim
      // alert($('#chon-rap').val()); //lay id rap
      // alert($('#chon-ngay').val()); //lay id rap
      $.ajax({
        url: 'xu_ly_dat_ve_phim.php?task=ds_gio',
        type: 'POST',
        data: { id_rap_phim: $('#chon-rap').val(), id_phim: $('#chon-phim').val(), ngay: $('#chon-ngay').val() },
        success: function(data){

          chuoi = "<option>--Chọn suất--</option>";
          ds_gio = $.parseJSON(data);
          //console.log(ds_gio); 
          $.each(ds_gio, function(index, value){
            chuoi += '<option value="'+value.id+'">'+value.gio_chieu+'</option>';
          });
          //console.log(chuoi);
          if(chuoi && chuoi !== "<option>--Chọn ngày--</option>")
          {
              $('#chon-suat').html(chuoi);
              $('#chon-suat').removeAttr("disabled");   
          }
          else
          {         
              $('#chon-suat').attr("disabled","disabled");
              $('#chon-suat').html(chuoi_chon_ngay);
          }
          
        }// success
      });  
    });

    //Chốt đặt vé

});

