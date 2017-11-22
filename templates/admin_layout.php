<?php
$user = isset($_SESSION["user"]) ? $_SESSION["user"] : NULL;
?>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/open-iconic/font/css/open-iconic-bootstrap.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
    <script src="public/js/validate.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <img src="public/img/pizza.png" alt="" class="rotate90">
        </a>
        <div class="collapse navbar-collapse">
            <?php
            if($user != NULL){ ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="admin.php?p=home" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="admin.php?p=pizzas" class="nav-link">Les pizzas</a>
                </li>
                <li class="nav-item">
                    <a href="admin.php?p=ingredients" class="nav-link">Les ingrédients</a>
                </li>
            </ul>
            <ul class='navbar-nav'>
                <li class="text-light">
                    Bonjour <?=$user->name?> ! <a href="admin.php?p=disconnect">Deconnexion</a>
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
</body>

</html>