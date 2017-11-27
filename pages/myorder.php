<?php
use App\Table\Pizza;
use App\Table\Client;

if(isset($_POST["pizzas"])){
    $_SESSION["order"] = $_POST["pizzas"];
}

if(!isset($_SESSION["client"])){
    header("Location: index.php?p=connexion");
}

$order = $_SESSION["order"];
?>
<script src="public/js/myorder.js"></script>
<br/>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Récapitulatif de la commande</h4>
            </div>
            <div class="card-body">
                <label id="pizza-error" class="error" for="libelle"></label>
                <form action="index.php?p=paypal" method="post">
                    <table class="list-order table" width="100%">
                        <thead>
                            <tr>
                                <th>Pizza</th>
                                <th>Ingrédients</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $total = 0;
                            foreach ($order as $id => $quantity)
                            {
                                if($quantity > 0)
                                {
                                    $pizza = Pizza::getById($id);
                                    $total += $pizza->prix;
                        ?>
                                    <tr>
                                        <td><?=$pizza->libelle?></td>
                                        <td><?=$pizza->ingredients?></td>
                                        <td><?=$pizza->prix?></td>
                                        <td><?=$quantity?></td>
                                    </tr>
                        <?php
                                }
                            }
                        ?>
                        <tr>
                            <td></td>
                            <td><b style="float:right">Total :</b></td>
                            <td colspan="2"><?=$total?></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="form-inline">
                        <label for="horaire" class="label col-2">Choix de l'horaire :</label>
                        <select id="horaire" class="form-control col-2" name="horaire"></select>
                    </div>
                    <input type="hidden" value="<?=$total?>"  name="total">
                    <button class="btn btn-success float-right mt-md-3"><b>Valider</b></button>
                </form>
            </div>
        </div>
    </div>
</div>
