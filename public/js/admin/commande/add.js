$(function(){
    initTable();
});

function initTable(){
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
        columnDefs: [{
                targets: 2,
                render: function(data, type, row) {
                    return parseFloat(data).toFixed(2).replace(".", ",") + " €";
                }
            },
            {
                targets: 3,
                render: function(data, type, row) {
                    let template = $("#template-input").html();
                    let values = { id: data };
                    return Mustache.render(template, values);
                }
            }
        ]
    });
}
