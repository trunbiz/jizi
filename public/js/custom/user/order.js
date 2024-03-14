function confirOrder(id_bill,id_user) {
    // e.preventDefault();
    var thongtin = jQuery("textarea#thongtinkhac").val();
    // console.log(thongtin);
    $.ajax({
        url:urlOrderConfirm,
        method:'post',
        data:{
            id_bill : id_bill,
            id_user: id_user,
            thongtin:thongtin,
            _token: _token            
        },
        success: function(data){
            console.log(data);
            toastr["success"]("Xác Nhận Đặt Hàng!!!", "Thông Báo");   
            const myTimeout = setTimeout(backHome,2000);
            
        },
        error: function(error){
            console.log(error);
        }
    })
}

function backHome() {
    window.location = home
}
function pickPrice(el,id) {
    // $('#text-Price').empty();
    $('.fa-solid').remove();
    $(el).append('<i class="fa-solid fa-check"></i>');
    // console.log(id);
    $.ajax({
        url:getPriceById,
        data:{
            id:id},
        success: function(data){
            var price = data.data.price;
            if(data.count == 1){
                priceConver = price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                $('#del-Price').text(priceConver);
                // price = (price * (100-data.sale[0].discount))/100;
            }
            priceConver = price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            $('#text-Price').text(priceConver);
            id_productByType = data.data.id;
            first_Price = price;
            console.log(first_Price);

        },
        error: function(error){
            console.log(error);
        }
    })
}

$(document).ready(function(){
    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            // If is not undefined
                $('#quantity').val(quantity + 1);
                // Increment
        });
        $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            // If is not undefined
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
        
});
//Order Product 
function OrderProductDetail() {
    var amount = $('#quantity').val();
    $.ajax({
        method:"POST",
        url:orderProduct,
        data:{
            _token:_token,
            amount:amount,
            description_detail_id:id_productByType,
            price:first_Price,
            id:id_Product,
        },
        success: function(data){
            toastr["success"]("Đặt hàng thành công!!!", "Thông Báo");  
            console.log(data);
        },
        error:function(error){
            console.log(error);
        }
    });
}
