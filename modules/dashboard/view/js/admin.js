function approve(id){
    $.ajax({
        type: "POST",
        url: home+'dashboard/approve/'+id,
        data: id,
        success: function (data) {
            if (data=='1') {

                splash('glyphicon glyphicon-ok', 'alert alert-success', 'Approved'); 
                redirect(home);
                
            } else {
                splash('glyphicon glyphicon-remove', 'alert alert-danger', 'Failed');

            }

        },
        dataType: 'JSON'
    });
    
}
function rejected(id){
    $.ajax({
        type: "POST",
        url: home+'dashboard/rejected/'+id,
        data: id,
        success: function (data) {
            if (data=='1') {

                splash('glyphicon glyphicon-ok', 'alert alert-success', 'Approved'); 
                redirect(home);
                
            } else {
                splash('glyphicon glyphicon-remove', 'alert alert-danger', 'Failed');

            }

        },
        dataType: 'JSON'
    });
    
}
$("#datepicker").datepicker({
    format: "yyyy-mm-dd"
});

$('.attendacelist').on('click',function(){
    var datepicker = $('#datepicker').val();
    if (datepicker !== "") {
        window.location.href = home + 'dashboard/index/' + datepicker;
    }else{
        splash('glyphicon glyphicon-remove', 'alert alert-danger', 'Period Cannot be Empty');
    }
});