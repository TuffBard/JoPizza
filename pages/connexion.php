<div class="container">
    <div class="col-12">
        <br/>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Connexion</h4>
            </div>
            <div class="card-body">
                <form action="pages/connect.php" method="POST">
                    <div class="form-inline justify-content-center">
                        <input type="text" id="username" class="form-control col-3 required" placeholder="Nom d'utilisateur" name="username">
                    </div>
                    <label id="username-error" class="error" for="username"></label>
                    <br/>
                    <div class="form-inline justify-content-center">
                        <input type="password" id="password" class="form-control col-3 required" placeholder="Mot de passe" name="password">
                    </div>
                    <label id="password-error" class="error" for="password"></label>
                    <br>
                    <?php
                    if (isset($_GET["bl"])) {
                    ?>
                        <div class='form-inline justify-content-center'>
                            <div class='alert alert-danger col-4' role='alert'>
                                <strong>Mauvais login ou mot de passe.</strong>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="form-inline justify-content-center">
                        <input type="submit" class="form-control" value="Connexion">
                    </div>
                    <br/>
                    <a href="index.php?r=compte&p=CreerCompte">Nouveau client</a>
                </form>
            </div>
        </div>
    </div>
</div>
