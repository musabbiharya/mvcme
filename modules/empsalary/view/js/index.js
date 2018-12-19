/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on('click', '.projectprice', function () {
    //alert('tes');
    var datepicker = $('#datepicker').val();
    if (datepicker !== "") {
        window.location.href = home + 'empsalary/index/'+ datepicker;
    }else{
        splash('glyphicon glyphicon-remove', 'alert alert-danger', 'Period Cannot be Empty');
    }
}
);

$("#datepicker").datepicker({
    format: "yyyy-mm",
    viewMode: "months",
    minViewMode: "months"
});
$("#startdate").datepicker({
    format: "yyyy-mm-dd"
});
$("#enddate").datepicker({
    format: "yyyy-mm-dd"
});

$(document).on('click', '.generatesal', function () {
    //alert('tes');
    var startdate = $('#startdate').val();
    var datepicker = $('#datepicker').val();
    var enddate = $('#enddate').val();
    if (startdate !== "" ||enddate !== "" ) {
        window.location.href = home + 'empsalary/generatesalary/'+ startdate+'/'+enddate+'/'+datepicker;
    }else{
        splash('glyphicon glyphicon-remove', 'alert alert-danger', 'startdate and enddate Cannot be Empty');
    }
}
);

$(document).on('click', '.emptyer', function () {
    //alert('tes');
    var datepicker = $('#datepicker').val();
    if (datepicker !== "") {
        window.location.href = home + 'empsalary/emptyer/'+ datepicker;
    }else{
        splash('glyphicon glyphicon-remove', 'alert alert-danger', 'Period Cannot be Empty');
    }
}
);

var t = $('#headersalary').DataTable({
    
    "targets": 0,
    info:false,
    columnDefs: [
       { render: $.fn.dataTable.render.number( '.', ',', 2, '' ), targets: 2 }
     ]
});
t.on('order.dt search.dt', function () {
    t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();