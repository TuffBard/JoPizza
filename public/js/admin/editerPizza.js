$(function () {
    initIngredientTable();
    initValidate();

    $("#prix").blur();
});

function initIngredientTable() {
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
                render: function (data, type, row) {
                    return "<input type='checkbox' class='form-control chk_" + data + "' name='ingredients[]' value='" + data + "'>";
                }
            }
        ],
        initComplete: function(){
            var idPizza = $("#idPizza").val();
            $.ajax({
                url: "api.php",
                method: "GET",
                data: {
                    p: "getIngredientsByPizzaId",
                    id: idPizza
                },
                dataType: "JSON",
                success: function(ingredients){
                    ingredients.forEach(x => {
                        $(".chk_"+x.id).prop("checked", true)
                    });
                }
            })
        }
    });
}

function initValidate() {
    $("#prix").blur(formatCurrency);
}

function formatCurrency() {
    var input = $(this).val().replace(",", ".");
    input = !isNaN(parseFloat(input)) ? parseFloat(input) : 0;
    input = input.toFixed(2);
    $(this).val(input);
}