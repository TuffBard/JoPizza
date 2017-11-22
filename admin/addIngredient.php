<?php
    //Appel de l'autologger
    require_once("../app/autoloader.php");
    Autoloader::register();
    //Lancement session
    session_start();
    //Appel des class utilisées
    use App\Table\Ingredient;

    $libelle = $_POST["libelle"];

    Ingredient::insert($libelle);

    header('Location: ../admin.php?p=ingredients');
?>