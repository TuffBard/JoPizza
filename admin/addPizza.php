<?php
    //Appel de l'autologger
    require_once("../app/autoloader.php");
    Autoloader::register();
    //Lancement session
    session_start();
    //Appel des class utilisées
    use App\Table\Ingredient;

    var_dump($_POST);
?>