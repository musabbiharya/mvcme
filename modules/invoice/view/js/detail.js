/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var iditem;
var t = $('#listitem').DataTable({
    "orderable": false,
    "paging": false,
    "targets": 0,
    info:false,
    columnDefs: [
       { render: $.fn.dataTable.render.number( '.', ',', 2, '' ), targets: 2 },
       { render: $.fn.dataTable.render.number( '.', ',', 2, '' ), targets: 5 }
     ],
    "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            var numFormat = $.fn.dataTable.render.number( '\.', ',', 2, '' ).display;
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 5 ).footer() ).html(
                numFormat(pageTotal) 
            );
        }
});
t.on('order.dt search.dt', function () {
    t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
        cell.innerHTML = i + 1;
    });
}).draw();
function simpan() {

    var data = $("#dataForm").serialize();
//    alert($("#userForm").attr('action'));
    $('#splash').removeClass();
    $('#splash span').removeClass();
    $.ajax({
        type: "POST",
        url: $("#dataForm").attr('action'),
        data: data,
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


    return false;

}

$(document).on('click', '.del', function () {
    //alert('tes');
    $(this).parent().parent().remove();
}
);
//			
$(document).on('click', '.add', function () {
    $.ajax({
        type: "POST",
        url: home + 'invoice/getitem/' + iditem,
        success: function (data) {

            console.log(data);
            t.row.add([
                "<input type=\"hidden\" name=\"idItems[]\" value =\"" + data.id + "\"  />" + data.name,
                "<input type=\"text\" name=\"price[]\" value =\"" + data.price + "\" class=\"text-right\" />",
                "<input type=\"text\" name=\"unit[]\" value =\"" + data.unit + "\" class=\"text-right\" />",
                "<a  class=\"btn btn-primary del\">Del</a>"
            ]).draw(false);
            $(".itemname").val("");
        },
        dataType: 'JSON'
    });


}
);

$(".itemname").autocomplete({
    source: home + 'invoice/getAllitem/',
    minLength: 0,
    select: function (event, ui) {

        iditem = ui.item.value;
        $(".itemname").val(ui.item.label);
        return false;
    }
}).focus(function () {

    $(this).data("uiAutocomplete").search($(this).val());
});
$(".itemname").each(function () {
    var $proj = $(this);

    $proj.data("ui-autocomplete")._renderItem = function (ul, item) {
        var $li = $('<li>');

        $li.attr('data-value', item.label);
        $li.append("<a>" + item.label + "</a>");

        return $li.appendTo(ul);
    };
});



$("input").click(function (e) {
    var idClicked = e.target;
    var tr = e.target.parentNode.parentNode;
    var id = t.row(tr).data();
    $(idClicked).on('change', function () {
        var qty = parseInt($(this).val());
        var price = id[2];
        var total = qty* price;
        t.rows(tr)
                .every(function (rowIdx, tableLoop, rowLoop) {
                    t.cell(rowIdx, 5).data(total);
                })
                .draw();
    });

});
