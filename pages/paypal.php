<?php
    use App\Table\Commande;

    $idClient = $_SESSION["client"]->id;
    $details = $_SESSION["order"];
    $total = $_POST["total"];
    $money =  str_replace(".",",",number_format($total,2))." €";

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
