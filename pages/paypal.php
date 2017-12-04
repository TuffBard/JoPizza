<?php
    use App\Table\Commande;

    $idClient = $_SESSION["client"]->id;
    $total = $_POST["total"];
    $total_pizza = $_POST["total_pizza"];

    //Met sous la forme X.XX €
    $money = str_replace(".",",",number_format($total,2))." €";
    if(!isset($_SESSION["commande"]))
    {
        //Supprime les données vides
        $details = array_filter($_SESSION["order"], function($v, $k){
            return ($v != "");
        }, ARRAY_FILTER_USE_BOTH);

        $horaire = $_POST["horaire"];
        $horaire = explode(":",$horaire);
        $date = new DateTime();
        $date->setTime($horaire[0],$horaire[1]);

        $date = $date->format("Y-m-d H:i:s");

        $idCommande = Commande::insert($idClient,$date,$total,$details,$total_pizza);
        $_SESSION["commande"] = $idCommande;
    }
 ?>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="public/js/paypal.js"></script>

<h3>Montant à payer : <?=$money?></h3>

<div id="paypal-button"></div>
