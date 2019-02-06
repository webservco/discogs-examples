function dataTableServerSide(tableIdentifier, listUrl, detailsUrl, columns, order) {
    if ($(tableIdentifier).length) {

        /* before DT init*/

        /* individual column search */
        $(tableIdentifier + " thead tr").clone(true).appendTo(tableIdentifier + " thead");

        /* DT init */
        var columns = $.merge(
            [
                {
                    "className": "details-control text-primary",
                    "orderable": false,
                    "data": null,
                    "defaultContent": ""
                }
            ],
            columns
        );
        var dataTableServerSide = $(tableIdentifier).DataTable({
            "ajax": {
                "url": listUrl,
                "type": "POST"
            },
            "columns": columns,
            "dom": "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'<'toolbar'>>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-8'p>>", //https://datatables.net/reference/option/dom
            "order": order, // 0 indexed
            "orderCellsTop": true, // Control which cell the order event handler will be applied to in a column.
            "pageLength": 10, // Default number of items per page
            "processing": true, // Feature control the processing indicator.
            "stateSave": true,
            "searchDelay": 1000,
            "serverSide": true
        });

        /* after DT init*/

        /* state reset */
        $(tableIdentifier + '_wrapper div.toolbar').html('<div class="dataTables_info text-right"><a class="app-nav reset btn btn-light" href="' + window.location.href + '">Clear filters</a></div>');
        $(tableIdentifier + '_wrapper div.toolbar').on('click', 'a.reset', function (event) {
            dataTableServerSide.state.clear();
        });

        /* individual column search */
        var input_filter_timeout;
        $(tableIdentifier + ' thead tr:eq(1) th').each(function (i) {
            if (i > 0) {
                var title = $(this).text();
                var input = $('<input type="text" placeholder="Search ' + title + '" />');
                var tableState = dataTableServerSide.state.loaded();
                if (tableState) { // check not null
                   input.val(tableState.columns[i].search.search);
                }

                $(this).html( input );
                $('input', this).on('keyup change', function (e) {
                    if ( dataTableServerSide.column(i).search() !== this.value ) {
                        var value = this.value;
                        clearTimeout(input_filter_timeout);
                        input_filter_timeout = setTimeout(function () {
                            dataTableServerSide.column(i).search(value).draw();
                        }, dataTableServerSide.context[0].searchDelay);
                    }
                });
            }
        });

        /* extra row details */
        $(tableIdentifier + ' tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dataTableServerSide.row( tr );
            if ( row.child.isShown() ) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                row.child( formatDetailsRow(detailsUrl, row.data()) ).show();
                tr.addClass('shown');
            }
        });
    }
}
