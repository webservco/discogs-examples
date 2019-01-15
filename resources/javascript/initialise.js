/* scripts to run on every page load (regular or ajax) */
function initialise() {
    dataTableServerSide(
        "#datatables-simple",
        urlApp + "DataTables/datatables/simple",
        [
            { "data": "id" },
            { "data": "name" },
            { "data": "value" },
        ],
        [[ 2, "asc" ]] // name
    );
    dataTableServerSide(
        "#datatables-database",
        urlApp + "DataTables/datatables/database",
        [
            { "data": "id" },
            { "data": "name" },
            { "data": "value" },
        ],
        [[ 2, "asc" ]] // name
    );
}
