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
                <form action="index.php?p=myorder" method="post">
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
                </form>
            </div>
        </div>
    </div>
</div>

<script id="template-input" type="x-tmpl-mustache">
    <input class='form-control input-pizza' name='pizzas[{{id}}]' type='text'>
</script>
