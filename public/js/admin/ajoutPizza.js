$(function(){
    initIngredientTable();
    initValidate();
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
    $("#prix").on("blur",function(){
        var input = $(this).val().replace(",",".");
        input = !isNaN(parseFloat(input)) ? parseFloat(input) : 0;
        input = input.toFixed(2);
        $(this).val(input);
    });
}