<?php 
session_start(); 
$client = isset($_SESSION["client"]) ? $_SESSION["client"] : null;
?>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="public/css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <img src="public/img/pizza.png" alt="" class="rotate90">
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?p=Commander" class="nav-link">Commander</a>
                </li>
            </ul>
            <?php 
                if($client != null){

                } else { 
            ?>
                    <ul class='navbar-nav'>
                        <li>
                            <a href='index.php?p=Connexion' class='nav-link'>Se connecter</a>
                        </li>
                    </ul>
            <?php
                }
            ?>
        </div>
    </nav>
    <div class="site-wrapper">
        <?= $content ?>
    </div>
    <div id="footer" class="text-muted">
        <p><a href="index.php?p=legals">Mentions légales</a></p>
    </div>
</body>

</html>