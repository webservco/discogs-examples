function formatDetailsRow(detailsUrl, rowData) {

    var div = $('<div/>')
        .addClass( 'loading' )
        .text( 'Loading...' );

    /* detailsUrl example: urlApp + "Controller/details/", */
    div.load(detailsUrl + rowData.DT_RowId + " #content", function(response, status, xhr) {

    }).removeClass( 'loading' );

    return div;
}
