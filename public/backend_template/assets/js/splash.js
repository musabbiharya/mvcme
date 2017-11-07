/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function splash(spanClass,divClass,msg,urlRedirect){
    $('#splash span').addClass(spanClass).html(msg);
    $('#splash').addClass(divClass).show().delay(1000).fadeOut(400);
    setTimeout(function() {
  window.location.href = home + urlRedirect;
}, 2000);
   
}