<?php
    require_once("app/autoloader.php");
    Autoloader::register();

    session_start();

    $p = isset($_GET['p']) ? $_GET['p'] : "home";

    $r = isset($_GET['r']) ? $_GET['r'] . "/" : "";

    ob_start();
    require("pages/" . $r . $p . ".php");
    $content = ob_get_clean();

    require("templates/layout.php")
?>
