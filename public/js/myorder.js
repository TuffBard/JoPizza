$(function(){
    initOrderTable();
});

function initOrderTable(){
    $(".list-order").DataTable({
        searching: false,
        paging: false,
        lengthChange: false,
        ordering: false,
        info: false,
        columnDefs: [
            {
                targets: 2,
                render: function (data, type, row) 
                {
                    return parseFloat(data).toFixed(2).replace(".", ",") + " €";
                }
            }
        ]
    });
}