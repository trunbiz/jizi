// $('#from_register').on('submit', function(e){
//     e.preventDefault();
//     var scr = new FormData(this);
//     $('.error').text('');
//     $.ajax({
//         url: 'register',
//         method: 'POST',
//         data:scr,
//         contentType: false,
//         cache: false,
//         processData: false,  
//         success: function(data){
//             console.log(data);
//             location.href = "home";
//         },
//         error: function(error){
//             console.log(error);
//             let tb = error.responseJSON.errors;
//             for(var i in tb){
//                 $('.error_' + i).text(tb[i][0]);
//             }
//         }
//     })
// })  

$('#loginadmin').on('submit',function(e) {
    e.preventDefault();
    var data = new FormData(this);
    var url = window.location.href;
    // console.log(url);
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
                if(data.permission == 2){
                    location.href = url+"/form-editProduct";
                }else{
                    location.href = listOrder;
                }
            } else{
                $('.error_request').text('Tài khoản hoặc mật khẩu không chính xác');
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