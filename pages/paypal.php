<?php
    $idClient = $_SESSION["client"]->id;
    $horaire = $_POST["horaire"];
    $total = $_POST["total"];
    $money =  str_replace(".",",",number_format($total,2))." €";
 ?>

Paiement par paypal
<br>
<button class="btn btn-success"> Payer <?=$money?> </button>
