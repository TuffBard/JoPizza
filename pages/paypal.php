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
<script src="https://js.stripe.com/v3/"></script>
<script src="public/js/paypal.js"></script>
<link rel="stylesheet" href="public/css/paypal.css">

<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Paiement de la commande</h4>
            </div>
            <div class="card-body">
                <form action="/charge" method="post" id="payment-form">
                    <div class="form-row">
                        <div id="card-element"></div>
                        <div id="card-errors" class="ml-auto" role="alert"></div>
                        <input id="total" type="hidden" value="<?=$total?>">
                        <button class="btn btn-success">Payer <?=$money?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="result">

</div>
