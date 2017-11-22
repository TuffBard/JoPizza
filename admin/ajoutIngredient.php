<!-- <script src="public/js/admin/ajoutIngredient.js"></script> -->
<div class="container">
    <div class="col-12">
        <br/>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajout d'un ingrédient</h4>
            </div>
            <div class="card-body">
                <form id="form-ingredient" action="admin/addIngredient.php" method="POST">
                    <div class="form-inline justify-content-center">
                        <input type="text" id="libelle" class="form-control col-3 required" placeholder="Libellé" name="libelle">
                        <label id="libelle-error" class="error" for="libelle"></label>
                    </div>
                    <br>
                    <div class="form-inline justify-content-center">
                        <a href="admin.php?p=ingredients" class="btn btn-primary mr-auto">Retour</a>
                        <input type="submit" class="form-control btn-success" value="Ajouter">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>