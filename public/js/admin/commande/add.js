$(function(){
    initTable();
    initHoraire();
});

function initTable(){
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
    ]
});
}

/**
 * Remplis la selectbox des horaires
 */
function initHoraire() {
    //Horaire matin
    var morning_open = moment().hour(11).minute(30);
    var morning_close = moment().hour(13).minute(30);
    //Horaire aprem
    var after_open = moment().hour(18).minute(30);
    var after_close = moment().hour(21).minute(30);

    var firstHour = getFirstHour();
    var closeAt = (firstHour.isBefore(morning_close) ? morning_close : after_close);

    var hours = [];
    while (firstHour.isBefore(closeAt)) {
        firstHour.add(10, "m").add("minute", (firstHour.minute() % 10 > 0 ? 10 - (firstHour.minute() % 10) : 0));
        hours.push(firstHour.format("HH:mm"));
    }

    $.ajax({
        url: "api.php",
        method: "GET",
        data: {
            p: "getCommandesOfDay"
        },
        success: function(data) {
            //Commandes en cours
            var commandes = JSON.parse(data);
            //Filtre les horaires déjà pris
            hours = hours.filter(function(el) {
                let isOk = true;
                for(var c of commandes){
                    //Transforme le datetime sous forme HH:mm
                    let hour = moment(c.horaire).format("HH:mm");
                    //Si plusieurs pizza, on bloque plusieurs horaires
                    for (i = 0; i < c.quantity; i++) {
                        h = moment(hour,"HH:mm");
                        h.subtract(10 * i, "minutes");
                        h = h.format("HH:mm");
                        if (h == el) {
                            isOk = false;
                        }
                    }
                }
                return isOk;
            });


            var nb_pizza = ~~$("#total_pizza").html();
            hours = hours.filter(function(hour) {
                var isOk = true;

                for (i = 0; i < nb_pizza; i++) {
                    let h = moment(hour, "HH:mm");
                    h.subtract(10 * i, "minutes");
                    h = h.format("HH:mm");
                    if (hours.indexOf(h) == -1) {
                        isOk = false;
                    }
                }

                return isOk;
            });

            //Remplis le select
            hours.forEach(function(x) {
                $("#horaire").append(new Option(x, x, true, true));
            });
            //Sélectionne le premier de la liste
            $("#horaire option:first").prop("selected", true);
        }
    });

}
/**
 * Retourne si c'est le weekend ou non
 * @param  {string}  date date à tester
 * @return {Boolean} True si weekend, False sinon
 */
function isWeekEnd(date) {
    var day = moment(date).day();
    return day == 0 && day == 6;
}

/**
 * Obtient le premier horaire disponnible
 * @return {moment} Premier horaire dispo
 */
function getFirstHour() {
    var now = moment();
    //var now = moment('2017-11-23 12:00');
    //Horaire matin
    var morning_open = moment().hour(11).minute(30);
    var morning_close = moment().hour(13).minute(30);
    //Horaire aprem
    var after_open = moment().hour(18).minute(30);
    var after_close = moment().hour(22);

    var firstHour;
    //Si ce n'est pas le week-end, ouvert le midi
    if (!isWeekEnd(now) && now.isBefore(morning_close)) {
        if (now.isBefore(morning_open)) {
            firstHour = morning_open;
        } else {
            firstHour = now;
        }
    } else //soir
    {
        if (now.isBefore(after_close)) { //Si avant fermeture
            if (now.isBefore(after_open)) {
                firstHour = after_open;
            } else {
                firstHour = now;
            }
        } else { //Si après fermeture
            firstHour = morning_open;
            firstHour.add(1, "d");
        }
    }
    return firstHour;
}
