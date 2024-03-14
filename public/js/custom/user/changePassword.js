$('#changepassword').on('submit',function(e) {
    e.preventDefault();
    var data = new FormData(this);
    // console.log(data);

    $('.error').text('');
    $.ajax({
        url:url,
        method:'POST',
        data:data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            console.log(data);
            if(data.success == true){
                // console.log(data.success);
                toastr["success"]("Đổi mật khẩu thành công");
                window.location.href = url_home;
            } 
            else{
                // console.log(data.success);
                toastr["error"]("Mật khẩu không chính xác");
                $(".input-pw").val("");
                // $('.error_request').text('Tài khoản hoặc mật khẩu không chính xác');
            }        
        },
        error: function (error) {
            console.log(error);
            let tb = error.responseJSON.errors;
            for(var i in tb){
                $('.error_' + i).text(tb[i][0]);
            }
        }
    })
})