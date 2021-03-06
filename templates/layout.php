<?php
$client = isset($_SESSION["client"]) ? $_SESSION["client"] : null;
?>
<html>

<head>
    <title>Jo-Pizza.fr</title>
    <meta charset="utf-8" />
    <meta name="language" content="fr">
    <meta name="author" content="nicolasemg.fr">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/open-iconic/font/css/open-iconic-bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/css/bootstrap-modal.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js"></script>
    <script src="public/js/validate.js"></script>
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
            if ($client != null) {
            ?>
                <ul class='navbar-nav'>
                    <li class="nav-item">
                        <a href='index.php?r=commande&p=mesCommandes' class="nav-link">Mes commandes</a>
                    </li>
                    <li class="nav-item">
                        <a href='index.php?r=compte&p=monCompte' class="nav-link">
                            <span class="oi oi-person"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href='index.php?p=disconnect' class="nav-link">
                            <span class="oi oi-power-standby"></span>
                        </a>
                    </li>
                </ul>
            <?php
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
        <p><a href="admin.php?p=home">Admin</a></p>
        <p><a href="index.php?p=legals">Mentions légales</a></p>
    </div>
</body>

</html>
