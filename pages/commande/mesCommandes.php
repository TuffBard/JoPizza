<script src="public/js/commande/commande.js"></script>

<br/>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Mes commandes</h4>
            </div>
            <div class="card-body">
                <input id="idClient" type="hidden" value="<?=$_SESSION["client"]->id?>">
                <table class="list-commande table" width="100%">
                    <thead>
                        <tr>
                            <th>Horaire</th>
                            <th>Client</th>
                            <th>Contenu</th>
                            <th>Total</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Template des status -->
<script id="template-status" type="x-tmpl-mustache">
    <label class='text-{{color}}'><span class='oi {{icon}}'></span> {{status}}</label>
</script>
