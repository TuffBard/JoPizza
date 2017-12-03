$(function() {
    initDatatable();
});

function initDatatable() {
    $(".list-commande").DataTable({
        ajax: {
            url: "api.php",
            data: {
                p: "getCommandesOfDay"
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
            { data: "horaire", width: "10%" },
            { data: "client" },
            { data: "details", width: "30%" },
            { data: "total" },
            { data: "status" }
        ],
        columnDefs: [{
                targets: 0,
                render: function(data, type, row) {
                    return moment(data).format("DD/MM/YYYY <b>HH:mm</b>");
                }
            },
            {
                targets: 1,
                render: function(data, type, row) {
                    return data.nom + " " + data.prenom
                }
            },
            {
                targets: 2,
                render: function(data, type, row) {
                    return "<table width='100%'>" + data.map(d => "<tr><td>" + d.pizza.libelle + "</td><td>" + d.quantity + "</td></tr>").join("") + "</table>";
                }
            },
            {
                targets: 3,
                render: function(data, type, row) {
                    return parseFloat(data).toFixed(2).replace(".", ",") + " €";
                }
            }
        ]
    });
}