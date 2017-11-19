/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function editUserSubmit() {
    var a = false;
    a = $('#userForm').validasi({
        role: {
            oldpass: 'required',
            newpass: 'required',
            newpassconfirm: 'required',
        }
    });
    var n = $('#newpass input').val();
    var nc = $('#newpassconfirm input').val();
    if (n !== nc) {
        a = false;
        $('#newpass').removeClass('has-error').addClass('has-error');
        $('#newpassconfirm').removeClass('has-error').addClass('has-error');
        $('#newpass .help-block').empty().html('not equal');
        $('#newpassconfirm .help-block').empty().html('not equal');
    }
    if (a) {
        editPass();
    }
}


function editPass() {
    var data = $("#userForm").serialize();
//    alert($("#userForm").attr('action'));
    $('#splash').removeClass();
    $('#splash span').removeClass();
    $.ajax({
        type: "POST",
        url: $("#userForm").attr('action'),
        data: data,
        success: function (data) {
//            console.log(home);
            if (data.success) {
//                alert('asu');
                splash('glyphicon glyphicon-ok', 'alert alert-success', data.msg);
                setTimeout(function () {
                    window.location.href = url_home+'dashboard/dashboard/logout';
                }, 2000);

            } else {
                splash('glyphicon glyphicon-remove', 'alert alert-danger', data.msg);
//              
            }

        },
        dataType: 'JSON'
    });


}

