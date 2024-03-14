var idItem;
var url = 'home/';
//price global when not selected
var price;
var description_detail_id;
var numOrder;

//show quick view product
$(document).on('click','#productItem',function(e){
    e.preventDefault();
    var id = $(this).data('id'); 
    idItem = id;
    $('.single-img-detail').remove();
    $.ajax({
        url:getProductById,
        method: 'GET',
        data:{
            id:idItem
        },
        success: function(data){
            // console.log(data.count);
            // Xóa content cũ
            $('#content_child').remove();
            //refresh option 
            $('.op').remove();
            // console.log(data.product[0].id);
            $('#OrderProduct').attr('data-id',data.product[0].id);
            $('#img_main').attr('src',data.product[0].pro_avatar);
            $('#name_product').text(data.product[0].pro_name);
            // conver price vnd
            price = data.product[0].price;            
            description_detail_id = data.product[0].id;
            // console.log('description_detail_id: ' + description_detail_id);
            priceConver = price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            // $('#pro_price').text(priceConver +" / "+data.product[0].type);
            if(typeof data.count === "undefined"){
                $('#pro_price').empty();
                $('#pro_price').append("<span style='color:red; margin-right:8px'>"+priceConver+" / "+data.product[0].type+"</span>");    
            }else{
                var sale = data.product[0].discount;
                var price_sale = (price*(100-sale))/100;
                var price_sale_cv = price_sale.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                $('#pro_price').empty();
                $('#pro_price').append("<p style='color:red;  margin-right:8px'>"+ price_sale_cv +" / "+data.product[0].type+"</p>"+" <del style='font-size:13px'> "+priceConver+ " </del> <span class='bdsale'>-"+sale+"%</span>" );  
            }
            var node = $('#optional');
            for(var i = 0; i< data.product.length; i++) {
                node.append('<button data-id="'+data.product[i].idDes+'" type="button" class="btn btn-danger op" id="op" >'+data.product[i].type+'</button> ');
            }
            //tạo div child bời vì khi ấn vào lần nữa sẽ xóa nó
            // $('#content').append('<div id="content_child">'+data.product[0].pro_content+'</div>');
            //add img
            $('#single-img').append(data.arr);
        },
        error: function(error){
            console.log(error);
        }
    })
});

//quick option
$(document).on('click','#op',function(e){
    e.preventDefault();
    var id = $(this).data('id'); 
    // idItem = id;
    $.ajax({
        url:getDesById,
        method: 'GET',
        data:{
            id:id
        },
        success: function(data){
            console.log(data.sale);
            if(data.count==0){
                price = data.product.price;
                description_detail_id = data.product.id;
                // console.log(description_detail_id);
                priceConver = price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                // $('#pro_price').text(priceConver +" / "+data.product.type);
                $('#pro_price').empty();
                $('#pro_price').append("<span style='color:red; margin-right:8px'>"+priceConver+" / "+data.product.type+"</span>");    
            }else{
                $('#pro_price').empty();
                price = data.product.price;
                description_detail_id = data.product.id;
                // console.log(description_detail_id);
                priceConver = price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                var sale = data.sale[0].discount;
                var price_sale = (price*(100-sale))/100;
                var price_sale_cv = price_sale.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                $('#pro_price').append("<p style='color:red;  margin-right:8px'>"+ price_sale_cv +" / "+data.product.type+"</p>"+" <del style='font-size:13px'> "+priceConver+ " </del> <span class='bdsale'>-"+sale+"%</span>" );  
            }
            
        },
        error: function(error){
            console.log(error);
        }
    })
});
// $(document).on('click',function(e){
//     e.preventDefault();
//     var id = $(this).data('id')
// })
//order product
$('#formOrder').on('submit', function(e){
    e.preventDefault();
    // console.log(idItem);
    var data = new FormData(this);
    var amount = $('#quantity').val();
    // console.log(data);
    data.append('id', idItem);
    data.append('_token',_token);
    data.append('price',price);
    data.append('amount',amount);
    data.append('description_detail_id',description_detail_id)
    $('.header-chart-dropdown').remove();
    $.ajax({
        url:orderProduct,
        method: 'POST',
        data:data,
        contentType: false,
        cache: false,
        processData: false,  
        success: function(data){
            toastr["success"]("Đặt hàng thành công!!!", "Thông Báo");  
            $('#quatityOrder').text(data.num + " Sản phẩm");
            $('#header-order').append(data.dataTranfer);
            // console.log(data);
            // transferDataOrder();
        },
        error: function(error){
            console.log(error);
        }
    })
})  	


//button option number
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


function nextPageProduct(url) {
    window.location= url;
}

//live search
$(document).ready(function(){
    $("#searchbar").keyup(function(e){      
        var input = $(this).val();
        input = input.trim();
        
        if(input !="" ){
            $.ajax({
                url:urlSearch,
                method:"GET",
                data:{pro_name:input},
                success:function(data){
                    console.log(data);
                    $("#result").css("display", "block");
                    $("#result").html(data.render);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
        else{
            $("#result").css("display", "none");
        }           
    });
});
