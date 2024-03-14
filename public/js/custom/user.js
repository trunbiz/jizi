//user register
$('#from_register').on('submit', function(e){
    e.preventDefault();
    var scr = new FormData(this);
    $('.error').text('');
    $.ajax({
        url: 'register',
        method: 'POST',
        data:scr,
        contentType: false,
        cache: false,
        processData: false,  
        success: function(data){
            console.log(data);
            location.href = "home";
        },
        error: function(error){
            console.log(error);
            let tb = error.responseJSON.errors;
            for(var i in tb){
                $('.error_' + i).text(tb[i][0]);
            }
        }
    })
})  

