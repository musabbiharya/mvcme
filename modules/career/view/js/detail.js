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
$('#publish').change(function(){
     if($(this).attr('checked')){
          $(this).val(1);
     }else{
          $(this).val(0);
     }
});
function simpan() {
    var a =false;
     a= $('#dataForm').validasi({
         role:{
             career:'required'
         }
     });
//    console.log(a);
    if(a){
        var data = objectifyForm($("#dataForm").serializeArray());
        
        data.jobdesc= CKEDITOR.instances.jobdesc.getData();
        
//    alert($("#userForm").attr('action'));
    $('#splash').removeClass();
    $('#splash span').removeClass();
    $.ajax({
        type: "POST",
        url: $("#dataForm").attr('action'),
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

function objectifyForm(formArray) {//serialize data function

  var returnArray = {};
  for (var i = 0; i < formArray.length; i++){
    returnArray[formArray[i]['name']] = formArray[i]['value'];
  }
  return returnArray;
}