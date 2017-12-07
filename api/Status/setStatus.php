<?php
    use App\Table\Commande;
    $id = $_POST["id"];
    $status = $_POST["status"];
    echo Commande::setStatus($id, $status);
?>
