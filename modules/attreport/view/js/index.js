/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on('click', '.projectprice', function () {
    //alert('tes');
    var datepicker = $('#datepicker').val();
    if (datepicker !== "") {
        window.location.href = home + 'attreport/index/'+ datepicker;
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

var t = $('#headersalary').DataTable({
    
    "targets": 0,
    info:false,
    
});
t.on('order.dt search.dt', function () {
    t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();