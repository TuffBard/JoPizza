$(function() {
    initDatatable();
});

/**
* Initialise le tableau des commandes
*/
function initDatatable() {
    idClient = $("#idClient").val();
    console.log(idClient);
    $(".list-commande").DataTable({
        ajax: {
            url: "api.php?p=getCommandesByClientId",
            type: "POST",
            data: {
                id: idClient
            },
            dataType: "json",
            dataSrc: ""
        },
        language: {
            emptyTable: "Aucune commande trouvée"
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
                return moment(data).format("DD/MM/YY <b>HH:mm</b>");
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
                let values = getValues(row.idStatus, row.status);

                return Mustache.render(template, values);
            }
        }
    ],
    initComplete: function(){
        autoReload();
    }
});
}

/**
 * Recharge le tableau des commandes
 */
function tableReload(){
    $(".list-commande").DataTable().ajax.reload();
}

/**
* Actualise le tableau des commandes
*/
function autoReload(){
    setTimeout(function(){
        tableReload();
        autoReload();
    }, 15000);
}

/**
* Renvoi les données pour le template status en fonction de du status
* @param  String status de la commande
* @return JSON        Données nécessaires au template-status
*/
function getValues(idStatus, status){
    switch (idStatus) {
        case "1": //En attente de paiement
        return {
            status: status,
            icon: "oi-timer",
            color: "warning"
        };
        case "2": //Paiement validé
        return {
            status: status,
            icon: "oi-credit-card",
            color: "info"
        };
        case "3": //Commande terminée
        return {
            status: status,
            icon: "oi-thumb-up",
            color: "muted"
        };
        case "31": //Commande annulée
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
