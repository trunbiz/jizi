
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
        {data:"c_name"},
        {data:"s_name"},
        {data:"price"},
        {data:"type"},
        {data:"id",
            render: function(data, type, row, meta){
                return "<button class='btn btn-success' onclick=confimOffer('"+data+"')><i class='fa-regular fa-circle-check'></i></button>"
            }
        },
    ]
});

function confimOffer(id) {    
    $.ajax({
        url:urlSetOffer,
        method:"POST",
        data:{
            id:id,
            _token:_token
        },
        success: function(data){
            toastr["success"]("Thành Công", "Thông Báo")  ;                  
        },
        error: function(error){
            console.log(error);
            toastr["error"]("Thất Bại","Lỗi");

        }
    })
}