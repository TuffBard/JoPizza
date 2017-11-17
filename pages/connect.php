<?php
    //Appel de l'autoloader
    require_once("../app/autoloader.php");
    Autoloader::register();
    //Appel de la session
    session_start();
    //Appel des tables utilisées
    use App\Table\Client;
    
    //Connexion du client
    $client = Client::login($_POST["username"],$_POST["password"]);

    if($client == null){
        header('Location: ../index.php?p=connexion&bl=1');
    } else {
        $_SESSION["client"] = $client;
        header('Location: ../index.php');
    }
?>