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
                let values = getValues(row.idStatus, row.status);

                return Mustache.render(template, values);
            }
        },
        {
            targets: 5,
            render: function(data, type, row){
                let template = $("#template-actions").html();
                let values = {
                    id: row.id,
                    status: row.idStatus
                };
                return Mustache.render(template, values);
            }
        }
    ],
    drawCallback: function(){
        initBtns();
    },
    initComplete: function(){
        autoReload();
    }
});
}

function autoReload(){
    setTimeout(function(){
        $(".list-commande").DataTable().ajax.reload();
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
        case "3": //En préparation
        return {
            status: status,
            icon: "oi-timer",
            color: "primary"
        };
        case "4": //Commande prête
        return {
            status: status,
            icon: "oi-check",
            color: "success"
        };
        case "5": //Commande terminée
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

/**
* Initialise les boutons du tableau
* @return {[type]} [description]
*/
function initBtns(){
    $(".btn-next").click(nextStatus);
}

/**
 * Passe le status au suivant
 */
function nextStatus(){
    var id = $(this).data("id");
    var status = ~~$(this).data("status") + 1;

    $.ajax({
        url: "api.php?r=Status&p=setStatus",
        type: "POST",
        data: {
            id: id,
            status: status
        },
        success: function(result){
            if(result == 1){
                $(".list-commande").DataTable().ajax.reload();
            }
        },
        error: function(status, xhr, err){
            //console.log(err);
        }
    });
}
