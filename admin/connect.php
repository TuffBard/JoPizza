<?php
    //Appel de l'autologger
    require_once("../app/autoloader.php");
    Autoloader::register();
    //Lancement session
    session_start();
    //Appel des class utilisées
    use App\Table\User;
    
    //Connexion
    $user = User::login($_POST["username"],$_POST["password"]);

    if($user != NULL){
        $_SESSION["user"] = $user;
        header('Location: ../admin.php?p=home');
    } else {
        header('Location: ../admin.php?p=connexion&bl=1');
    }
?>