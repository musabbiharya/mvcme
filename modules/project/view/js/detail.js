/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function simpan() {
    var a =false;
     a= $('#dataForm').validasi({
         role:{
             page:'required',
             descript:'required'
         }
     });
//    console.log(a);
    if(a){
        var data = $("#dataForm").serialize();
//    alert($("#userForm").attr('action'));
    $('#splash').removeClass();
    $('#splash span').removeClass();
    $.ajax({
        type: "POST",
        url: $("#dataForm").attr('action'),
        data: data,
        success: function (data) {
//            console.log(home);
            if (data.success) {
//                alert('asu');
                splash('glyphicon glyphicon-ok', 'alert alert-success', data.msg); 
                redirect();
                
            } else {
                splash('glyphicon glyphicon-remove', 'alert alert-danger', data.msg);
//              
            }

        },
        dataType: 'JSON'
    });

    }
    return false;

}

$('.datepicker').datepicker({
});

$('.getloc').on('click',function(){
    var sitename = $("input[name=site]").val();
    $.ajax({
        type: "POST",
        url: "https://maps.googleapis.com/maps/api/geocode/json?address="+sitename+"&key=AIzaSyAoMoCXfaMix78wsFxAHh8c0I9s4w0UaC4",
        success: function (data) {
            if (data.status='ok'){
                $("input[name=logitude]").val(data.results[0].geometry.location.lat+','+data.results[0].geometry.location.lng);
            }else{
                splash('glyphicon glyphicon-remove', 'alert alert-danger', 'get latitude failed');
            }
            

        },
        dataType: 'JSON'
    });
});