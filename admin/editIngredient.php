<?php
    //Appel de l'autologger
    require_once("../app/autoloader.php");
    Autoloader::register();
    //Lancement session
    session_start();
    //Appel des class utilisées
    use App\Table\Ingredient;

    $id = $_POST["id"];
    $libelle = $_POST["libelle"];

    Ingredient::update($id,$libelle);

    header('Location: ../admin.php?p=ingredients');
?>
