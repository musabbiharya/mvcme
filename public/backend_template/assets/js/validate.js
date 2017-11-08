/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery.fn.extend({

    validasi: function (option) {
        if (option.role !== undefined) {
            var objRole = option.role;
            var property;

            for (property in objRole) {
                var elemen= $(this).find('#' + property);
                var elementObj = elemen.find(':input');
//                console.log(elemen);
                elemen.removeClass('has-error');
                elemen.removeClass('has-success');
//                 elementObj.removeClass('has-error');
//                elementObj.removeClass('has-success');
                elemen.addClass(objRole[property]);
                elemen.find('.help-block').html('');

                if (elementObj.val() === "") {
                    elemen.error();
//                    elementObj.error();
                    if (option.message[property] !== undefined) {
                        elemen.find('.help-block').html(option.message[property]);
                    }else{
                        elemen.find('.help-block').html('required');
                    }

                } else if (option.minLength !== undefined) {
                    if (elementObj.val().length < option.minLength[property]) {
                        elemen.error();
//                        elementObj.error();
                        elemen.find('.help-block').html('minimal '+option.minLength[property]+' karakter');
                        


                    }

                }
            }
        }
        return !($(this).find('div').hasClass('has-error'));

    },
    error: function () {
        return this.addClass('has-error');
    },
    success: function () {
        return this.addClass('has-success');
    }
});
