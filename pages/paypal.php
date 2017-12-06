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

<style media="screen">
/**
* The CSS shown here will not be introduced in the Quickstart guide, but shows
* how you can use CSS to style your Element's container.
*/
.StripeElement {
background-color: white;
height: 40px;
padding: 10px 12px;
border-radius: 4px;
border: 1px solid transparent;
box-shadow: 0 1px 3px 0 #e6ebf1;
-webkit-transition: box-shadow 150ms ease;
transition: box-shadow 150ms ease;
}

.StripeElement--focus {
box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
border-color: #fa755a;
}

.StripeElement--webkit-autofill {
background-color: #fefde5 !important;
}

#card-element {
    width: 400px;
}
</style>
<div class="container">
    <h4>Paiement de la commande</h4>
    <br>
    <form action="/charge" method="post" id="payment-form">
      <div class="form-row">
        <div id="card-element">
          <!-- a Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors -->
        <div id="card-errors" role="alert"></div>
      </div>

      <button class="btn btn-success">Payer <?=$money?></button>
    </form>
</div>
