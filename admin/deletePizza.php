<?php
    //Appel des class utilisées
    use App\Table\Pizza;

    $id = $_GET["id"];

    Pizza::delete($id);

    header('Location: admin.php?p=pizzas');
?>