<script src="public/js/admin/ingredients.js"></script>

<br/>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Les ingrédients</h4>
            </div>
            <div class="card-body">
                <a class="btn btn-success float-right mb-md-3" href="admin.php?p=ajoutIngredient">
                    <span class="oi oi-plus mr-auto"></span> <b>Ajouter</b>
                </a>
                <table class="list-ingredient table" width="100%">
                    <thead>
                        <tr>
                            <th>Ingrédient</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script id="template-action" type="x-tmpl-mustache">
    <a href='admin.php?p=editerIngredient&id={{id}}' class='btn btn-primary'><span class='oi oi-pencil' aria-hidden='true'></span></a>
    <a href='admin.php?p=deleteIngredient&id={{id}}' class='btn btn-danger'><span class='oi oi-trash' aria-hidden='true'></span></a>
</script>