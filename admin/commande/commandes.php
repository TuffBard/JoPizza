<script src="public/js/admin/commandes.js"></script>

<br/>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Les commandes</h4>
            </div>
            <div class="card-body">
                <a class="btn btn-success float-right mb-md-3" href="admin.php?r=commande&p=ajoutCommande"><span class="oi oi-plus mr-auto"></span> <b>Ajouter</b></a>
                <table class="list-commande table" width="100%">
                    <thead>
                        <tr>
                            <th>Horaire</th>
                            <th>Client</th>
                            <th>Contenu</th>
                            <th>Total</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script id="template-status" type="x-tmpl-mustache">
<label class='text-{{color}}'><span class='oi {{icon}}'></span> {{status}}</label>
</script>

<script id="template-actions" type="x-tmpl-mustache">
    <button class="btn btn-sm btn-primary"><span class='oi oi-pencil'></span></button>
    <button class="btn btn-sm btn-danger"><span class='oi oi-x'></span></button>
</script>
