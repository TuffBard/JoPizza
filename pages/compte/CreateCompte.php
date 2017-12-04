<?php
    use App\Table\Client;

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $login = $_POST["username"];
    $mail = $_POST["mail"];
    $tel = $_POST["tel"];
    $password = sha1($_POST["password"]);
    $confirm = $_POST["confirm"];

    if(Client::MailAlreadyExist($mail)){
        echo "<h4 style='color:red'>Cette adresse mail est déjà utilisée.</h4>";
    }
    else if(Client::LoginAlreadyExist($login)){
        echo "<h4 style='color:red'>Ce login est déjà utilisée.</h4>";
    }
    else if($password != $confirm){
        echo "<h4 style='color:red'>Les deux mots de passes ne sont pas identiques</h4>";
    }
    else{
        Client::insert($nom,$prenom,$mail,$tel,$login,$password);
        echo "<h3>Votre compte a bien été créé. Vous pouvez dés maintenant vous connecter.</h3>";
    }

 ?>
