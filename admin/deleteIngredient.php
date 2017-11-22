<?php
    //Appel des class utilisées
    use App\Table\Ingredient;

    $id = $_GET["id"];

    Ingredient::delete($id);

    header('Location: admin.php?p=ingredients');
?>