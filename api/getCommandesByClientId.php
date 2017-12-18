<?php
    use App\Table\Commande;
    $idClient = $_POST["id"];
    echo json_encode(Commande::getAllByIdClient($idClient));
?>
