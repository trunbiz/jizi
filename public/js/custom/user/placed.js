var table = $('#myTable').DataTable({
    // processing: true,
    // serverSide: true,
    "ajax" : urlDataBillPlace, //var urlDataBillPlace in file orderPlaced = "{{route('dataBillPlace')}}"
    "columns" :[
        {data:"b_id",
            render: (data, type, row, meta) => meta.row + 1    
        },
        {data:"b_id",
            render:function(data, type, row, meta){
                return '<td class="th-delate"><button  data-toggle="modal" data-target="#listOrderDetail" id="showListOrder" class="btn btn-info" onclick="showBill('+ data +','+ row.b_user_id  +')"><i class="fa-solid fa-cart-shopping"></i></button></td>';
            }
        },
        {data:"b_total",
            render:function(data, type, row, meta){
                return data.toLocaleString()+" vnđ  ";
            }
        },
        {data:"fullAddress",
            // render:function(data, type, row, meta){
            //     return data.toLocaleString();
            // }
        },
        {data:"b_note",
            // render:function(data, type, row, meta){
            //     return data.toLocaleString();
            // }
        },
        {data:"create_at",
            render:function(data, type, row, meta){
                return data.split("-").reverse().join("-");;
            }
        }
    ],
    columnDefs:[{        // targets: [1],
        // className: 'th-details',
        
    },
    {
        "width": "2%", 
        "targets": 0
    },
    {
        "width": "5%", 
        "targets": 1
    },
    {
        "width": "20%", 
        "targets": [3]
    },
    {
        "width": "15%", 
        "targets": [4]
    }
    ]
});
function showBill(bill_id,user_id) {
    $('.single-review').remove();

    $.ajax({
        url:urlShowBillPlaceWithIdUser,  // var urlShowBillPlaceWithIdUser in orderPlaced.blade.php
        data:{
            bill_id:bill_id,
            user_id:user_id
        },
        method: 'GET',
        success: function(data){
            $('.checkout-head').append(data.pd)
        },
        error: function(error){
            console.log(error);

        }
    })
}