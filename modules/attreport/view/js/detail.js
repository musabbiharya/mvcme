
var t = $('#detailsalay').DataTable({
     "orderable": false,
    "paging": false,
    "targets": 0,
    "searching": false,
    info:false,
//    columnDefs: [
//       { render: $.fn.dataTable.render.number( '.', ',', 2, '' ), targets: 2 },
//       { render: $.fn.dataTable.render.number( '.', ',', 2, '' ), targets: 3 }
//     ]
});
t.on('order.dt search.dt', function () {
    t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();