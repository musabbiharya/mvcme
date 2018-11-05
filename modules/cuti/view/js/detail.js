$("#startdate").datepicker({
    format: "yyyy-mm-dd"
    
});
$("#enddate").datepicker({
    format: "yyyy-mm-dd"
    
});

function cutiselect(el){
    var cuti = el.val();
    if (cuti ==='0'){
        alert('choose Leave');
    }
    if (cuti ==='Annual'){
        $( ".reason" ).toggle();
        $("input[name=reason]").prop('disabled',false);
        console.log($("input [name=reason]"));
        if ($('.evidence').css('display') !== 'none'){
            $( ".evidence" ).toggle();
            $("input[name=evidence]").prop('disabled',true);
        }
    }
    if (cuti ==='Sick'){
        if ($('.reason').css('display') !== 'none'){
            $( ".reason" ).toggle();
            $("input[name=reason]").prop('disabled',true);
        }
       $("input[name=evidence]").prop('disabled',false);
        $( ".evidence" ).toggle();
    }
};


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

