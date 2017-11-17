<?php
    require("app/autoloader.php");
    Autoloader::register();
    
    $p = isset($_GET["p"]) ? $_GET["p"] : "notfound";
    require("api/" . $p . ".php");
?> 