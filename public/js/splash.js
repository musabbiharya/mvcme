/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function splash(spanClass,divClass,msg){
    $('#splash span').addClass(spanClass).html(msg);
    $('#splash').addClass(divClass).show().delay(8000).fadeOut(400);
}
function redirect(){
 setTimeout(function() {
  window.location.href = home ;
}, 2000);   
}