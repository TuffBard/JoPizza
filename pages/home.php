<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="public/css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="public/js/index.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <img src="public/img/pizza.png" alt="" class="rotate90">
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="index.php" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item" id="item-commander">
                    <a href="index.php?p=Commander" class="nav-link">Commander</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="site-wrapper">
        <div class="jumbotron jumbo-title">
            <h1 class="display-3">Jo Pizza !</h1>
            <p class="lead">118, Avenue Francis de Préssensé, 69200 Vénissieux</p>
            <hr class="my-4">
            <p>Du lundi au vendredi de 11h30 à 13h30</p>
            <p>Tous les soirs du lundi au dimanche de 18h30 à 22h00</p>
            <p class="lead">
                <a href="index.php?p=Commander" class="btn btn-primary btn-lg">Commander</a>
            </p>
        </div>
    </div>
</body>

</html>