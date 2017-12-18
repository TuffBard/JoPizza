<?php
use App\Table\Pizza;
use App\Table\Client;
use App\Table\Commande;

if(isset($_POST["pizzas"])){
    $pizzas = $_POST["pizzas"];
    //Supprime les données vides
    $details = array_filter($pizzas, function($v, $k){
        return ($v != "");
    }, ARRAY_FILTER_USE_BOTH);

    //Récupère le nb total de pizzas et le montant total de la commande
    $total = 0;
    $total_pizza = 0;
    foreach($details as $id => $quantity){
        $pizza = Pizza::getById($id);
        $total += $pizza->prix * $quantity;
        $total_pizza += $quantity;
    }

    //Récupère et formate l'heure
    $horaire = $_POST["horaire"];
    $horaire = explode(":",$horaire);
    $date = new DateTime();
    $date->setTime($horaire[0],$horaire[1]);

    $date = $date->format("Y-m-d H:i:s");

    //Récupère les informations du client
    $nom = $_POST["lastname"];
    $prenom = $_POST["firstname"];
    $tel = $_POST["phone"];

    //recherche du client en base
    $client = Client::getByNames($nom, $prenom);
    //Si le client existe on le charge
    if($client != null){
        $idClient = $client->id;
    } else {
        //Sinon on le créé
        $idClient = Client::insert($nom,$prenom,null,$tel,null,null);
    }

    //Enregistrement de la commande
    $idCommande = Commande::insert($idClient,$date,$total,$details,$total_pizza);
    //Passe le status à l'état validé
    Commande::setStatus($idCommande, 2);

    header("Location: admin.php?r=commande&p=commandes");
}
?>

<link rel="stylesheet" href="public/css/admin/commande/add.css">
<script src="public/js/admin/commande/add.js"></script>

<br/>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ajout d'une pizza</h4>
            </div>
            <div class="card-body">
                <label id="pizza-error" class="error" for="libelle"></label>
                <form action="admin.php?r=commande&p=add" method="post">
                    <button class="btn btn-success float-right mb-md-3 btn-continuer"><b>Continuer</b></button>
                    <table class="list-pizza table" width="100%">
                        <thead>
                            <tr>
                                <th>Pizza</th>
                                <th>Ingrédients</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="form-inline">
                        <label for="horaire" class="label col-2">Choix de l'horaire :</label>
                        <select id="horaire" class="form-control col-2" name="horaire"></select>
                    </div>
                    <br/>
                    <div class="form-inline">
                        <label for="lastname" class="label col-2">Nom :</label>
                        <input type="text" id="lastname" class="form-control col-2 mr-2" name="lastname"></select>
                    </div>
                    <br/>
                    <div class="form-inline">
                        <label for="firstname" class="label col-2">Prénom :</label>
                        <input type="text" id="firstname" class="form-control col-2 mr-2" name="firstname"></select>
                    </div>
                    <br/>
                    <div class="form-inline">
                        <label for="phone" class="label col-2">Téléphone :</label>
                        <input type="text" id="phone" class="form-control col-2" name="phone"></select>
                    </div>
                    <button class="btn btn-success float-right mb-md-3 btn-continuer"><b>Continuer</b></button>
                </form>
            </div>
        </div>
    </div>
</div>

<script id="template-input" type="x-tmpl-mustache">
<input class='form-control input-pizza' name='pizzas[{{id}}]' type='text'>
</script>
