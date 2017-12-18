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
            { data: "horaire", width: "10%" },
            { data: "client" },
            { data: "details", width: "30%" },
            { data: "total" },
            { data: "status" }
        ],
        columnDefs: [{
            targets: 0,
            render: function(data, type, row){
                console.log(row);
                return moment(data).subtract("minutes", 10 * row.quantity).format("DD/MM/YY <b>HH:mm</b>");
            }
        },
        {
            targets: 1,
            render: function(data, type, row) {
                return moment(data).format("DD/MM/YY <b>HH:mm</b>");
            }
        },
        {
            targets: 2,
            render: function(data, type, row) {
                return data.nom + " " + data.prenom;
            }
        },
        {
            targets: 3,
            render: function(data, type, row) {
                return "<table width='100%'>" + data.map(d => "<tr><td>" + d.pizza.libelle + "</td><td>" + d.quantity + "</td></tr>").join("") + "</table>";
            }
        },
        {
            targets: 4,
            render: function(data, type, row) {
                return parseFloat(data).toFixed(2).replace(".", ",") + " €";
            }
        },
        {
            targets: 5,
            render: function(data, type, row) {
                let template = $("#template-status").html();
                let values = getValues(row.idStatus, row.status);

                return Mustache.render(template, values);
            }
        },
        {
            targets: 6,
            render: function(data, type, row){
                return getAction(row);
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
 * Renvoi les boutons d'actions en fonction du status de la commande
 * @param  Object row Ligne du tableau
 * @return HtmlString
 */
function getAction(row){
    let template, values;

    switch (row.idStatus) {
        case "1": //En attente de paiement
        return "";
        case "2": //Paiement validé
        template = $("#template-actions").html();
        values = {
            id: row.id,
            status: row.idStatus
        };
        return Mustache.render(template, values);
        case "3": //Commande terminée
        return "";
        case "31": //Commande annulée
        return "";
        default:
        return "";
    }
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

/**
* Initialise les boutons du tableau
* @return {[type]} [description]
*/
function initBtns(){
    $(".btn-next").click(nextStatus);
    $(".btn-abort").click(modalAnnulerCommande);
    $("#btn-annulerCommande").click(annulerCommande);
}

/**
 * Passe la commande au status "Commande annulée"
 */
function annulerCommande(){
    var id = $("#modalId").val();

    $.ajax({
        url: "api.php?r=Status&p=setStatus",
        type: "POST",
        data: {
            id: id,
            status: 31
        },
        success: function(result){
            if(result == 1){
                tableReload();
                $("#modalAnnuler").modal("hide");
            }
        }
    });
}

/**
 * Ouvre la modal de confirmation d'annulation de la commande
 * @return {[type]} [description]
 */
function modalAnnulerCommande(){
    var id = $(this).data("id");

    $("#modalAnnuler").modal("show");
    $("#modalId").val(id);
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
                tableReload();
            }
        },
        error: function(status, xhr, err){
            //console.log(err);
        }
    });
}
