// $('#proImages').on('submit',function (e) {
//     e.preventDefault();
//     console.log('hi');
// })
var id_glo;
function addImages(id) {
    id_glo = id;
    $('#files').val('');
    var html = '<input type="hidden" name="pro_id" required value='+id+'></input>';
    $('#hidden').html(html);
    id_Product = id;
    $('.d-flex').remove();
        $.ajax({
        url:ListImgProduct,
        data:{
            pro_id:id
        },
        success: function(data){
            console.log(data);
            $('#conten_img').append(data.data);
        },
        error:function(error){
            console.log(error);
        }
    })
}

function delImgDetail(str,name) {
    // console.log(str);
    // console.log(id_glo);
    $.ajax({
        url:updateProductImagesDetail,
        method: 'POST',
        // cache: false,
        // contentType: false,
        // processData: false,
        data:{
            id:id_glo,
            img_path:str,
            _token:_token,
        },
        success: function (data) {
            $('#'+name).remove();
            toastr["success"]("Xóa Thành Công", "Thông Báo")  ;                  
        },
        error: function (error) {
            console.log(error);
        }
    })
}