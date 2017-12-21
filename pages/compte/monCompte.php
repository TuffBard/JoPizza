<?php
    $client = $_SESSION['client'];
 ?>

<br/>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Mon compte</h4>
            </div>
            <div class="card-body" style="text-align: left;">
                <label class="label">Nom :</label> <?=$client->nom?>
                <br>
                <label class="label">Prénom :</label> <?=$client->prenom?>
                <br>
                <label class="label">Login :</label> <?=$client->login?>
                <br>
                <label class="label">Téléphone :</label> <?=$client->tel?>
                <br>
                <label class="label">Mail :</label> <?=$client->mail?>
            </div>
        </div>
    </div>
</div>
