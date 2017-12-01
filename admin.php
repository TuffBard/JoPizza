<?php
    //Appel de l'autoloader
    require_once("app/autoloader.php");
    Autoloader::register();
    //Appel de la session
    session_start();

    //Si la route n'est pas indiqué, renvoi sur la page d'accueil admin
    $p = isset($_GET['p']) ? $_GET['p'] : "home";

    //Ajoute une route si besoin
    $r = isset($_GET['r']) ? $_GET['r']."/" : "";

    //Si l'utilisateur n'est pas connecté, renvoi sur la connexion
    if(!isset($_SESSION["user"])){
        $p = "connexion";
    }

    //Ajout du contenu de la page dans une div
    ob_start();
    require("admin/". $r . $p . ".php");
    $content = ob_get_clean();

    //Appel du layout
    require("templates/admin_layout.php")
?>
