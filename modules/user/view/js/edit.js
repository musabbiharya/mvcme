/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function editUserSubmit() {

    var data = $("#userForm").serialize();
//    alert($("#userForm").attr('action'));
    $('#splash').removeClass();
    $('#splash span').removeClass();
    $.ajax({
        type: "POST",
        url: $("#userForm").attr('action'),
        data: data,
        success: function (data) {
            console.log(home);
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
