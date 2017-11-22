<?php
    require_once("app/autoloader.php");
    Autoloader::register();

    session_start();

    $p = isset($_GET['p']) ? $_GET['p'] : "home";

    ob_start();
    require("pages/" . $p . ".php");
    $content = ob_get_clean();

    require("templates/layout.php")
?>
