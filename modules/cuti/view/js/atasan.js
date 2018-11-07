/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function approve(id) {
    var datepick = $('#datepicker').val();
    $.ajax({
        type: "POST",
        url: home + 'cuti/approve/' + id + '/' + datepick,
        data: id,
        success: function (data) {
            if (data == '1') {

                splash('glyphicon glyphicon-ok', 'alert alert-success', 'Approved');
                var redurl = home + 'cuti/index/' + datepick;
               setTimeout(function () {
                    window.location.href = redurl;
                }, 2000);

            } else {
                splash('glyphicon glyphicon-remove', 'alert alert-danger', 'Failed');

            }

        },
        dataType: 'JSON'
    });

}
function rejected(id) {
    var datepick = $('#datepicker').val();
    $.ajax({
        type: "POST",
        url: home + 'cuti/rejected/' + id + '/' + datepick,
        data: id,
        success: function (data) {
            if (data == '1') {

                splash('glyphicon glyphicon-ok', 'alert alert-success', 'Approved');
                var redurl = home + 'cuti/index/' + datepick;
                setTimeout(function () {
                    window.location.href = redurl;
                }, 2000);

            } else {
                splash('glyphicon glyphicon-remove', 'alert alert-danger', 'Failed');

            }

        },
        dataType: 'JSON'
    });

}