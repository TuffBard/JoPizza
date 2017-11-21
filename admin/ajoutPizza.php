<!-- <link rel="stylesheet" href="public/css/ajoutPizza.css"> -->
<script src="public/js/admin/ajoutPizza.js"></script>
<div class="container">
    <div class="col-12">
        <br/>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajout d'une pizza</h4>
            </div>
            <div class="card-body">
                <form action="admin/addPizza.php" method="POST">
                    <div class="form-inline justify-content-center">
                        <input type="text" id="nom" class="form-control col-3" placeholder="Nom" name="nom">
                    </div>
                    <br>
                    <div class="form-inline justify-content-center">
                        <input type="text" id="prix" class="form-control col-3" placeholder="Prix" name="prix">
                    </div>
                    <div class="col-6 ml-auto mr-auto">
                        <table class="list-ingredient table">
                            <thead>
                                <tr>
                                    <th>Ingrédient</th>
                                    <th>Sélection</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <br>
                    <div class="form-inline justify-content-center">
                        <input type="submit" class="form-control btn-success" value="Ajouter">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>