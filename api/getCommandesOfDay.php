<?php
    use App\Table\Commande;

    echo json_encode(Commande::getAllOfTheDay());
?>
