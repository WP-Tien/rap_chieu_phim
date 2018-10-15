$(function() {
    // Menu xet dang nhap
    $('.inp--submit').click(function() {
        $.ajax({
            url: "kiem_tra_dang_nhap.php",
            method: "POST",
            data: {username: $('#username').val(), password: $('#password').val()},
            success: function(data){
                //console.log(data);
                if(data)
                {
                    //thong_tin_user = $.parseJSON(data);
                    //$('#ten-dang-nhap').html("Chào bạn: " + thong_tin_user.username);
                    $('.navbar-right').html(data);
                    $('#button-dangnhap-dangki').click();
                }
                else
                {
                    alert("Tài khoản hoặc mật khẩu không tồn tại");
                }
            }
        });
    });
});
