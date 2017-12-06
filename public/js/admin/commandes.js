$(function() {
    initDatatable();
});

/**
 * Initialise le tableau des commandes
 */
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
                return data.nom + " " + data.prenom;
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
        },
        {
            targets: 4,
            render: function(data, type, row) {
                let template = $("#template-status").html();
                let values = getValues(data);

                return Mustache.render(template, values);
            }
        },
        {
            targets: 5,
            render: function(data, type, row){
                let template = $("#template-actions").html();
                let values = {};
                return Mustache.render(template, values);
            }
        }
    ]
});
}

/**
 * Renvoi les données pour le template status en fonction de du status
 * @param  String status de la commande
 * @return JSON        Données nécessaires au template-status
 */
function getValues(status){
    switch (status) {
        case "En attente de paiement":
        return {
            status: status,
            icon: "oi-timer",
            color: "warning"
        };
        case "Paiement validé":
        return {
            status: status,
            icon: "oi-credit-card",
            color: "info"
        };
        case "En préparation":
        return {
            status: status,
            icon: "oi-timer",
            color: "primary"
        };
        case "Commande prête":
        return {
            status: status,
            icon: "oi-check",
            color: "success"
        };
        case "Commande terminée":
        return {
            status: status,
            icon: "oi-thumb-up",
            color: "muted"
        };
        case "Commande annulée":
        return {
            status: status,
            icon: "oi-x",
            color: "danger"
        };
        default:
        return {
            status: status
        };
    }
}
