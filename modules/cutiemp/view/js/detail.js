$("#startdate").datepicker({
    format: "yyyy-mm-dd",
    "setDate": new Date(),
    "autoclose": true

});
$("#enddate").datepicker({
    format: "yyyy-mm-dd",
    "setDate": new Date(),
    "autoclose": true

});

function cutiselect(el) {
    var cuti = el.val();
    if (cuti === '0') {
        alert('choose Leave');
    }
    if (cuti === 'Annual') {
        $(".reason").toggle();
        $("input[name=reason]").prop('disabled', false);
        console.log($("input [name=reason]"));
        if ($('.evidence').css('display') !== 'none') {
            $(".evidence").toggle();
            $("input[name=evidence]").prop('disabled', true);
        }
    }
    if (cuti === 'Sick') {
        if ($('.reason').css('display') !== 'none') {
            $(".reason").toggle();
            $("input[name=reason]").prop('disabled', true);
        }
        $("input[name=evidence]").prop('disabled', false);
        $(".evidence").toggle();
    }
}
;


function simpan() {
    var a = false;
    var s = $('#startdate').val();
    var e = $('#enddate').val();
    var cuti = $('#cuti').val();
    if (s == '' || e == '' || cuti == '0') {
        a = false;
    }


    if (a) {
        var myForm = document.getElementById('dataForm');
        var file_data = $("#evidence").prop("files")[0];
        var form_data = new FormData(myForm);
        form_data.append("file", file_data);
//        var data = $("#dataForm").serialize();
//    alert($("#userForm").attr('action'));
        $('#splash').removeClass();
        $('#splash span').removeClass();
        $.ajax({
            type: "POST",
            url: $("#dataForm").attr('action'),
            data: form_data,
            processData: false,
            contentType: false,
            success: function (data) {
//            console.log(home);
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

    } else {
        splash('glyphicon glyphicon-remove', 'alert alert-danger', 'Leave, Start date and End date Cannot be empty');
    }
    return false;

}

