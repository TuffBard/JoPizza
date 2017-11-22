$(function(){
    initIngredientTable();
})

function initIngredientTable(){
    $(".list-ingredient").DataTable({
        ajax: {
            url: "api.php",
            data: {
                p: "getAllIngredients"
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
            { data: "id", width: "20%" }
        ],
        columnDefs: [
            {
                targets: 1,
                render: function (data, type, row) {
                    var template = $("#template-action").html();
                    var values = {
                        id: data
                    };
                    return Mustache.render(template, values);
                }
            }
        ]
    });
}