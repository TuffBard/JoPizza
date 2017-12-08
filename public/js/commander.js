$(function() {
    initPizzaTable();
    initFormValidation();
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
            targets: 0,
            render: function(data){
                return "<b>" + data + "</b>";
            }
        },
        {
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
        // , {
        //     targets: 4,
        //     render: function(data, type, row) {
        //         let template = $("#template-action").html();
        //         let values = { id: data };
        //         return Mustache.render(template, values);
        //     }
        // }
    ]
});
}


function initBtnContinuer() {
    $(".btn-continuer").click(function () {
        let listPizza = [];

        $(".input-pizza").each(function () {
            listPizza.push({
                id: $(this).data("id"),
                quantity: $(this).val()
            });
        });
        listPizza = JSON.stringify(listPizza);
        console.log(listPizza);
    });
}

function initFormValidation() {
    $("form").submit(function(event){

        let total = 0;
        $(".input-pizza").each(function () {
            total += ~~$(this).val();
        });

        if(total == 0){
            event.preventDefault();
            $("#pizza-error").html("Veuillez choisir au moins une pizza.");
        }
    });
}
