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

function addUserSubmit() {
    var a =false;
     a= $('#userForm').validasi({
        role: {
            username: 'required',
            password: 'required',
            fname:'required',
            lname:'required'

        },
        message: {
            username: 'username harus diisi',
            password: 'password harus diisi'

        },
        minLength: {
            username: 5,
            password: 8

        }
    });
//    console.log(a);
    if(a){
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

