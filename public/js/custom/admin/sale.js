var table = $('#myTable').DataTable({
    "ajax":urlProduct,
    "columns":[
        {data:"id",
            render: function(data, type, row, meta){
                return meta.row+1;
            }
        },
        {data:"pro_name"},
        {data:"pro_avatar",
            render: function(data, type, row, meta){
                return '<img src="'+asset+data+'" alt="'+row.pro_name+'" width="80px" height="100px"">'
            }
        },
        {data:"price"},
        {data:"id",
            render: function(data, type, row, meta){
                var select =    '<select onchange="changeRate('+data+')" class="form-select" aria-label="Default select example" id="select_sale_'+data+'">'+
                                    '<option value="10" selected>10%</option>'+
                                    '<option value="15">15%</option>'+
                                    '<option value="20">20%</option>'+
                                    '<option value="25">25%</option>'+
                                    '<option value="30">30%</option>'+
                                    '<option value="25">35%</option>'+
                                    '<option value="40">40%</option>'+
                                    '<option value="45">45%</option>'+
                                    '<option value="50">50%</option>'+
                                '</select>';
                return select;
            }
        },
        {data:"type"},
        {data:"id",
            render: function(data, type, row, meta){
                return "<button class='btn btn-success' onclick=confimSale('"+data+"')><i class='fa-regular fa-circle-check'></i></button>"
            }
        },
    ],
    columnDefs:[
        {
            targets : [-1,-2,-3,-4],
            className: 'dt-body-center',
        },
    ]
});

function confimSale(id) {
    var sale = $("#select_sale_"+id).val();
    var star_sale = $('#star_sale').val();
    var end_sale = $('#end_sale').val();
    $.ajax({
        url:setProductSale,
        method: 'POST',
        data:{
            id:id,
            star_sale:star_sale,
            end_sale:end_sale,
            sale:sale,
            _token:_token
        },
        success: function(data){
            console.log(data);
            toastr["success"]("Thành Công", "Thông Báo");
            table.ajax.reload();                 
        },
        error: function(error){
            var fail = "";
            let tb = error.responseJSON.errors;
            for(var i in tb){
                fail += tb[i][0] + " ";
            }
            toastr["error"]("Thất Bại ("+fail+")","Lỗi");
            console.log(error);
        }
    })
}