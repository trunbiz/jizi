var city_code;
var district_code;
$(window).on('load',function(e){
    selectDistrictByCity(e);
});

$('select#city').on('change', function (e) {
    selectDistrictByCity(e);
});

$('select#district').on('change', function (e) {
    var district_code = $("select#district").val();
    selectWardsByDistrict(district_code);    
});
function selectDistrictByCity(e) {
    e.preventDefault();
    city_code = $("select#city").val();
    $.ajax({
        url:urlDistrict,
        method:'get',
        data:{
            id_city : city_code
        },
        success: function(data){
            $(".multi_district").remove();
            // district_name
            var items = data.district;
            $.each(items, function (i, item) {
                district_name = item.district_name;
                $('#district').append($('<option class="multi_district">').val(items[i].district_code).text(items[i].district_name))
            });        
            district_code = $("select#district").val();
            selectWardsByDistrict(district_code);    
        },
        error: function(error){
            console.log(error);
        }
    })
}

function selectWardsByDistrict(district_code) {
    $.ajax({
        url:urlWards,
        method:'get',
        data:{
            district_code : district_code
        },
        success: function(data){
            $(".multi_wards").remove();
            // district_name
            var items = data.wards;
            $.each(items, function (i, item) {
                $('#wards').append($('<option class="multi_wards">').val(items[i].wards_code).text(items[i].wards_name))
            }); 
        },
        error: function(error){
            console.log(error);
        }
    })
}   
