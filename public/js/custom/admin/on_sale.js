var table = $('#ProductOnSale').DataTable({
    "ajax":ProductOnSale,
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
        {data:"discount"},
        {data:"discount",
        render: function(data, type, row, meta){
            return (row.price *(100 - data))/100;
        }
        },
        {data:"start_sale"},
        {data:"end_sale"},

        {data:"id",
            render: function(data, type, row, meta){
                return "<button class='btn btn-danger' onclick=confimDeleteSale('"+data+"')><i class='fa-solid fa-trash-can'></i></button>"
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

function confimDeleteSale(id) { 
    $.ajax({
        url:DeleteProductSale,
        method: 'POST',
        data:{
            id:id,
            _token:_token
        },
        success: function(data){
            console.log(data);
            toastr["success"]("Xóa Thành Công", "Thông Báo");
            table.ajax.reload();                 

        },
        error: function(error){
            toastr["error"]("Thất Bại","Lỗi");

            console.log(error);
        }
    })
}