/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery.fn.extend( {
        validateForm: function() {
          var a =  this.find('input required');
         this.removeClass('has-error');
          if ((a=="") || (a.length<8)){
              return this.addClass('has-error');
          }
          else {
              return this.addClass('has-success');
          }
        },
        y: function() {}
});