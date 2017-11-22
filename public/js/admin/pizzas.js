$(function(){
    initDatatable();
});

function initDatatable(){
    $(".list-pizza").DataTable({
        ajax: {
            url: "api.php",
            data: {
                p: "getPizzas"
            },
            dataType: "json",
            dataSrc: ""
        },
        searching: false,
        paging: false,
        lengthChange: false,
        ordering: false,
        info: false,
        columns: [
            { data: "libelle" },
            { data: "ingredients" },
            { data: "prix" },
            { data: "id" }
        ],
        columnDefs: [
            {
                targets: 2,
                render: function(data, type, row) {
                    return parseFloat(data).toFixed(2).replace(".", ",") + " €";
                }
            },
            {
                targets: 3,
                render: function(data, type, row) {
                    var template = $("#template-action").html();
                    var values = {
                        id : data
                    };
                    return Mustache.render(template, values);
                }
            }
        ]
    });
}