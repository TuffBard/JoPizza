<?php
    use App\Table\Ingredient;
    $id = $_GET["id"];
    $ingredient = Ingredient::getById($id);
?>
<!-- <script src="public/js/admin/editerPizza.js"></script> -->
<div class="container">
    <div class="col-12">
        <br/>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edition d'une pizza</h4>
            </div>
            <div class="card-body">
                <form id="form-ingredient" action="admin/editIngredient.php" method="POST">
                    <input id="idIngredient" type="hidden" name="id" value="<?=$id?>">

                    <div class="form-inline justify-content-center">
                        <input type="text" id="libelle" class="form-control col-3 required" placeholder="Libellé" name="libelle" value="<?=$ingredient->libelle?>">
                        <label id="libelle-error" class="error" for="libelle"></label>
                    </div>
                    <br>

                    <div class="form-inline justify-content-center">
                        <a href="admin.php?p=ingredients" class="btn btn-primary mr-auto">Retour</a>
                        <input type="submit" class="form-control btn-success" value="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>