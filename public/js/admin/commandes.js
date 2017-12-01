$(function(){
    initDatatable();
});

function initDatatable(){
    $(".list-commande").DataTable({
        ajax: {
            url: "api.php",
            data: {
                p: "getCommandes"
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
            { data: "id", width: "10%" },
            { data: "client.nom" },
            { data: "details", width: "40%" },
            { data: "total" },
            { data: "status" },
            { data: "horaire" }
        ],
        columnDefs: [
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
            },
            {
                targets: 5,
                render: function(data, type, row) {
                    return moment(data).format("DD/MM/YYYY HH:mm");
                }
            }
        ]
    });
}
