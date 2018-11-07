function approve(id) {
    var datepick = $('#datepicker').val();
    $.ajax({
        type: "POST",
        url: home + 'dashboard/approve/' + id + '/' + datepick,
        data: id,
        success: function (data) {
            if (data == '1') {

                splash('glyphicon glyphicon-ok', 'alert alert-success', 'Approved');
                var redurl = home + 'dashboard/index/' + datepick;
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
        url: home + 'dashboard/rejected/' + id + '/' + datepick,
        data: id,
        success: function (data) {
            if (data == '1') {

                splash('glyphicon glyphicon-ok', 'alert alert-success', 'Approved');
                var redurl = home + 'dashboard/index/' + datepick;
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
$("#datepicker").datepicker({
    format: "yyyy-mm-dd"
});

$('.attendacelist').on('click', function () {
    var datepicker = $('#datepicker').val();
    if (datepicker !== "") {
        window.location.href = home + 'dashboard/index/' + datepicker;
    } else {
        splash('glyphicon glyphicon-remove', 'alert alert-danger', 'Period Cannot be Empty');
    }
});