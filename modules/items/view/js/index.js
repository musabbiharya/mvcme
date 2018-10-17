/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('body').modalLoad('Delete Page','delete');
$(document).on("click", ".openModal", function () {
     var data = $(this).data('id');
     $(".modal-footer .btn-primary").attr('onclick',"del('"+data+"')");
     $(".modal-body").append('<span>Hapus menu Id '+data+'? </span>');
});


function del(id) {

$('#splash').removeClass();
    $('#splash span').removeClass();
    $.ajax({
        type: "POST",
        url: home+'page/del/'+id,
        data: id,
        success: function (data) {
            if (data.success) {

                splash('glyphicon glyphicon-ok', 'alert alert-success', data.msg); 
                redirect('user');
                
            } else {
                splash('glyphicon glyphicon-remove', 'alert alert-danger', data.msg);

            }

        },
        dataType: 'JSON'
    });
}
