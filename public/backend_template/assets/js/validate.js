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
                var elemen = $(this).find('#' + property);
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
                if (option.message !== undefined){
                    if (option.message[property] !== undefined) {
                        elemen.find('.help-block').html(option.message[property]);
                    } else {
                        elemen.find('.help-block').html('required');
                    }
                }else{elemen.find('.help-block').html('required');}

                } else if (option.minLength !== undefined) {
                    if (elementObj.val().length < option.minLength[property]) {
                        elemen.error();
//                        elementObj.error();
                        elemen.find('.help-block').html('minimal ' + option.minLength[property] + ' karakter');



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
    },
    modalLoad:function (title,classmodal){
        var dialog = "<div class='modal fade "+classmodal+" ' id='myModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'><\n\
                    div class='modal-dialog'>\n\
                    <div class='modal-content'>\n\
                                        <div class='modal-header'>\n\
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>\n\
                                            <h4 class='modal-title' id='myModalLabel'>"+title+"</h4>\n\
                                        </div>\n\
                                        <div class='modal-body'>\n\
                                           \n\
                                        </div>\n\
                                        <div class='modal-footer'>\n\
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>\n\
                                            <button type='button' class='btn btn-primary' onclick='' data-dismiss='modal'>Save changes</button>\n\
                                        </div>\n\
                                    </div>\n\
                                </div>\n\
                            </div>";
        return $(this).append(dialog);
    
}
});
