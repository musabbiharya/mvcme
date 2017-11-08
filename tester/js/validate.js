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
                var elementObj = $('#' + property + ' :input');
                elementObj.removeClass('error');
                elementObj.removeClass('success');
                elementObj.addClass(objRole[property]);
                $('#' + property).find("span").remove();

                if (elementObj.val() === "") {
                    elementObj.error();
                    if (option.message !== undefined) {
                        elementObj.after("<span class='spanError'>" + option.message[property] + "</span>");
                    }

                } else if (option.minLength !== undefined) {
                    if (elementObj.val().length < option.minLength[property]) {
                        elementObj.error();
                        elementObj.after("<span class='spanError'> minimal " + option.minLength[property] + " karakter</span>");


                    }

                }
            }
        }
        return !($(this).find('div').hasClass('asu'));
//        return !($(this).find('div :input').hasClass('error'));

    },
    error: function () {
        return this.addClass('error');
    },
    success: function () {
        return this.addClass('success');
    }
});
