$(function(){
    initIngredientTable();
});

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
            { data: "id", width: "10%" }
        ],
        columnDefs: [
            {
                targets: 1,
                render: function(data, type, row) {
                    return "<input type='checkbox' class='form-control' name='ingredients[]' value='" + data + "'>";
                }
            }
        ]
    });
}

function initValidate(){
    $("#nom").rules()
}