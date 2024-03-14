// var urlDataBill in file bill.blade.php
var table = $('#myTable').DataTable({
    // processing: true,
    // serverSide: true,
    "ajax" : urlDataBill,
    "columns" :[
        {data:"pro_avatar",
            render:function(data, type, row, meta){
                return '<img src="'+asset+data+'" width="100px" height="100px"">';
            }    
        },
        {data:"pro_name",
            render:function(data, type, row, meta){
                var text ="";
                text += '<h2><a href="#">'+data+'</a></h2>';
                text += '<p>Loại : '+ row.type +'</p>';
                return text;
            }
        },
        {data:"bd_amount"},
        {data:"bd_price",
            render:function(data, type, row, meta){
                return data.toLocaleString();
            }
        },
        {data:"bd_total_amount",
            render:function(data, type, row, meta){
                return data.toLocaleString();
            }
        },
        {data:"bd_id",
            render:function(data, type, row, meta){
                return '<td class="th-delate"><a  onclick="deleteProduct('+ data +','+ row.bd_bill_id +')"><i class="fa fa-trash"></i></a></td>';
            }
        }
    ],
    columnDefs:[{
        targets: [1],
        className: 'th-details',
    }]
});
// urlDelectProduct in file bill.blade.php
function deleteProduct(bd_id,id_bil) {
    $.ajax({
        url: urlDelectProduct,
        method: "GET",
        data:{
            bd_id:bd_id,
            id_bil:id_bil
        },
        success: function(data){
            table.ajax.reload();
            console.log(data);
        },
        error:function(error){
            console.log(error);
        }
    });
}