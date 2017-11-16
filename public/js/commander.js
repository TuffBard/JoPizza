$(function() {
    initPizzaTable();
    initBtnContinuer();
});

function initPizzaTable() {

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
                    return "<input class='form-control input-pizza' type='number' data-id='" + data + "'>";
                }
            }, {
                targets: 4,
                render: function(data, type, row) {
                    return "<button class='btn btn-primary btn-sm'>+</button> <button class='btn btn-danger btn-sm'>-</button>";
                }
            }
        ]
    });
}

function initBtnContinuer() {
    $(".btn-continuer").click(function() {
        let listPizza = [];

        $(".input-pizza").each(function() {
            listPizza.push({
                id: $(this).data("id"),
                quantity: $(this).val()
            });
        });
        listPizza = JSON.stringify(listPizza);
        console.log(listPizza);
    });
}