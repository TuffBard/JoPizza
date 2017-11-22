<?php
use App\Table\Client;

$_SESSION["order"] = $_POST["pizzas"];

if(isset($_SESSION["client"])){
    header("Location: index.php?p=myorder");
} else {
    header("Location: index.php?p=connexion");
}
?>