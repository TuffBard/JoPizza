$(function(){
    initOrderTable();
    initHoraire();
});

function initOrderTable(){
    $(".list-order").DataTable({
        searching: false,
        paging: false,
        lengthChange: false,
        ordering: false,
        info: false,
        columnDefs: [
            {
                targets: 2,
                render: function (data, type, row)
                {
                    return parseFloat(data).toFixed(2).replace(".", ",") + " €";
                }
            }
        ]
    });
}

function initHoraire(){
    //Horaire matin
    var morning_open = moment().hour(11).minute(30);
    var morning_close = moment().hour(13).minute(30);
    //Horaire aprem
    var after_open = moment().hour(18).minute(30);
    var after_close = moment().hour(22).minute(0);

    var firstHour = getFirstHour();
    var closeAt = (firstHour.isBefore(morning_close) ? morning_close : after_close);

    var hours = [];
    while (firstHour.isBefore(closeAt)) {
        firstHour.add(10,"m");
        hours.push(firstHour.format("HH:mm"));
    }

    //Remplis le select
    hours.forEach(function(x){
        $("#horaire").append(new Option(x,x,true,true));
    })
}
/**
* Retourne si c'est le weekend ou non
* @param  {string}  date date à tester
* @return {Boolean} True si weekend, False sinon
*/
function isWeekEnd(date){
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
    if(!isWeekEnd(now) && now.isBefore(morning_close))
    {
        if(now.isBefore(morning_open)){
            firstHour = morning_open;
        } else {
            firstHour = now;
        }
    }
    else //soir
    {
        if(now.isBefore(after_close)){ //Si avant fermeture
            if(now.isBefore(after_open)){
                firstHour = after_open;
            } else {
                firstHour = now;
            }
        } else { //Si après fermeture
            firstHour = morning_open;
            firstHour.add(1,"d");
        }
    }
    return firstHour;
}
