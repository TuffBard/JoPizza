<?php
    use App\Table\Pizza;
    $id = $_GET["id"];
    $pizza = Pizza::getById($id);
?>
<script src="public/js/admin/editerPizza.js"></script>
<div class="container">
    <div class="col-12">
        <br/>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edition d'une pizza</h4>
            </div>
            <div class="card-body">
                <form id="form-pizza" action="admin/editPizza.php" method="POST">
                    <input id="idPizza" type="hidden" name="id" value="<?=$id?>">

                    <div class="form-inline justify-content-center">
                        <a href="admin.php?p=pizzas" class="btn btn-primary mr-auto">Retour</a>
                        <input type="submit" class="form-control btn-success" value="Modifier">
                    </div>

                    <div class="form-inline justify-content-center">
                        <input type="text" id="libelle" class="form-control col-3 required" placeholder="Libellé" name="libelle" value="<?=$pizza->libelle?>">
                        <label id="libelle-error" class="error" for="libelle"></label>
                    </div>
                    <br>

                    <div class="form-inline input-group justify-content-center">
                        <input type="text" id="prix" class="form-control col-3 required" placeholder="Prix" name="prix" value="<?=$pizza->prix?>">
                        <span class="input-group-addon">€</span>
                    </div>
                    <label id="prix-error" class="error" for="prix"></label>

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
                        <a href="admin.php?p=pizzas" class="btn btn-primary mr-auto">Retour</a>
                        <input type="submit" class="form-control btn-success" value="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>