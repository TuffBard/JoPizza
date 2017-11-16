<?php

$p = isset($_GET['p']) ? $_GET['p'] : "home";

require("\pages\\" . $p . ".php");
?>
