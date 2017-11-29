<?php
    use App\Table\Commande;

    $idClient = $_SESSION["client"]->id;
    $total = $_POST["total"];

    //Met sous la forme X.XX €
    $money = str_replace(".",",",number_format($total,2))." €";

    //Supprime les données vides
    $details = array_filter($_SESSION["order"], function($v, $k){
        return $v != "";
    }, ARRAY_FILTER_USE_BOTH);

    $horaire = $_POST["horaire"];
    $horaire = explode(":",$horaire);
    $date = new DateTime();
    $date->setTime($horaire[0],$horaire[1]);

    $date = $date->format("Y-m-d H:i:s");

    Commande::insert($idClient,$date,$total,$details);
 ?>

Paiement par paypal
<br>
<button class="btn btn-success"> Payer <?=$money?> </button>
