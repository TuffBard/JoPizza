<?php
    require_once("../app/autoloader.php");
    Autoloader::register();

    session_start();

    use App\Table\Client;

    $client = Client::login($_POST["username"],$_POST["password"]);

    $_SESSION["client"] = $client;

    if($client == null){
        header('Location: ../index.php?p=connexion&bl=1');
    } else {
        header('Location: ../index.php');
    }
?>