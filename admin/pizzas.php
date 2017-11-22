<script src="public/js/admin/pizzas.js"></script>

<br/>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Les pizzas</h4>
            </div>
            <div class="card-body">
                <a class="btn btn-success float-right mb-md-3" href="admin.php?p=ajoutPizza"><span class="oi oi-plus mr-auto"></span> <b>Ajouter</b></a>
                <table class="list-pizza table" width="100%">
                    <thead>
                        <tr>
                            <th>Pizza</th>
                            <th>Ingrédients</th>
                            <th>Prix</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script id="template-action" type="x-tmpl-mustache">
    <a href='admin.php?p=editerPizza&id={{id}}' class='btn btn-primary'><span class='oi oi-pencil' aria-hidden='true'></span></a>
    <a href='admin.php?p=deletePizza&id={{id}}' class='btn btn-danger'><span class='oi oi-trash' aria-hidden='true'></span></a>
</script>