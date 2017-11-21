<?php
    //Appel de l'autologger
    require_once("../app/autoloader.php");
    Autoloader::register();
    //Lancement session
    session_start();
    //Appel des class utilisées
    use App\Table\Pizza;

    $libelle = $_POST["libelle"];
    $prix = $_POST["prix"];
    $ingredients = isset($_POST["ingredients"]) ? $_POST["ingredients"] : [];

    Pizza::insert($libelle,$prix,$ingredients);

    header('Location: ../admin.php?p=pizzas');
?>