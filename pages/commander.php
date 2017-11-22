<link rel="stylesheet" href="public/css/commander.css">
<script src="public/js/commander.js"></script>

<br/>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Faites votre choix !</h4>
            </div>
            <div class="card-body">
                <label id="pizza-error" class="error" for="libelle"></label>
                <form action="index.php?p=command" method="post">
                    <button class="btn btn-success float-right mb-md-3 btn-continuer"><b>Continuer</b></button>
                    <table class="list-pizza table" width="100%">
                        <thead>
                            <tr>
                                <th>Pizza</th>
                                <th>Ingrédients</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                    </table>
                    <button class="btn btn-success float-right mt-md-3 btn-continuer"><b>Continuer</b></button>
                </form>
            </div>
        </div>
    </div>
</div>

<script id="template-input" type="x-tmpl-mustache">
    <input class='form-control input-pizza' name='pizzas[{{id}}]' type='text'>
</script>

<!-- <script id="template-action" type="x-tmpl-mustache">
    <button class='btn btn-primary btn-sm' data-id='{{id}}'>+</button> 
    <button class='btn btn-danger btn-sm' data-id='{{id}}'>-</button>    
</script> -->