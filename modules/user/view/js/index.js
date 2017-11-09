/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('body').modalLoad('Delete User','delete');
$(document).on("click", ".openModal", function () {
     var data = $(this).data('id');
     $(".modal-footer .btn-primary").attr('onclick',"delUser('"+data+"')");
     $(".modal-body").append('<span>Hapus User Id '+data+'? </span>');
});


function delUser(id) {
//    var a= konfirmasi();
    console.log(home+'user/delUser/'+id);
$('#splash').removeClass();
    $('#splash span').removeClass();
    $.ajax({
        type: "POST",
        url: home+'user/delUser/'+id,
        data: id,
        success: function (data) {
            if (data.success) {
//                alert('asu');
                splash('glyphicon glyphicon-ok', 'alert alert-success', data.msg); 
                redirect('user');
                
            } else {
                splash('glyphicon glyphicon-remove', 'alert alert-danger', data.msg);
//              
            }

        },
        dataType: 'JSON'
    });
}

