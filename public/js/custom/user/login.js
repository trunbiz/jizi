$('#loginuser').on('submit',function(e) {
    e.preventDefault();
    var data = new FormData(this);
    // console.log(data);
    var url = window.location.href;
    // var url = 'http://web.com:8080/home';
    console.log(url);
    $('.error').text('');
    $.ajax({
        url:url,
        method:'POST',
        data:data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if(data.success){
                location.href =url_home;
                //console.log(data);
            } 
            else{
                toastr["error"]("Tài khoản hoặc mật khẩu không chính xác");
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