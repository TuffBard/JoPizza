<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="public/css/main.css">
    <link rel="stylesheet" href="public/css/commander.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="public/js/commander.js"></script>
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
                <li class="nav-item active">
                    <a href="commander.php" class="nav-link">Commander</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="site-wrapper">
        <br/>
        <div class="container">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Faites votre choix !</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success float-right mb-md-3 btn-continuer"><b>Continuer</b></button>
                        <table class="list-pizza table" width="100%">
                            <thead>
                                <tr>
                                    <th>Pizza</th>
                                    <th>Ingrédients</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                        <button class="btn btn-success float-right mt-md-3 btn-continuer"><b>Continuer</b></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>