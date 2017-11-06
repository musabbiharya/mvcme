/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function editUserSubmit(){
    
    var data = $("#userForm").serialize();
//    alert($("#userForm").attr('action'));
    
  $.ajax({
  type: "POST",
  url: $("#userForm").attr('action'),
  data: data,
  success: function (data) {
       (data.error=0)?splash('glyphicon-ok','alert-success',data.msg):splash('glyphicon-remove','alert-danger',data.msg);
            
            },
  dataType: 'JSON'
});

    
}