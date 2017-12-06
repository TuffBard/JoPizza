<?php
    require("app/autoloader.php");
    Autoloader::register();

    $p = isset($_GET["p"]) ? $_GET["p"] : "notfound";

    $r = isset($_GET['r']) ? $_GET['r'] . "/" : "";

    require("api/" . $r . $p . ".php");
?>
