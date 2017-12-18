<script src="public/js/admin/commande/commandes.js"></script>

<br/>
<div class="container">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Les commandes</h4>
            </div>
            <div class="card-body">
                <a class="btn btn-success float-right mb-md-3" href="admin.php?r=commande&p=add"><span class="oi oi-plus mr-auto"></span> <b>Ajouter</b></a>
                <table class="list-commande table" width="100%">
                    <thead>
                        <tr>
                            <th>Horaire début</th>
                            <th>Horaire fin</th>
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

<!-- Modal d'annulation d'une commande -->
<div id="modalAnnuler" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Annulation de la commande</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Êtes vous sûr d'annuler cette commande ?</p>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="modalId">
        <button id="btn-annulerCommande" type="button" class="btn btn-primary">Oui</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>

<!-- Template des status -->
<script id="template-status" type="x-tmpl-mustache">
    <label class='text-{{color}}'><span class='oi {{icon}}'></span> {{status}}</label>
</script>

<!-- Template des actions -->
<script id="template-actions" type="x-tmpl-mustache">
    <button class="btn btn-sm btn-success btn-next" data-id="{{id}}" data-status="{{status}}"><span class='oi oi-caret-right'></span></button>
    <!-- <button class="btn btn-sm btn-primary"><span class='oi oi-pencil'></span></button> -->
    <button class="btn btn-sm btn-danger btn-abort" data-id="{{id}}"><span class='oi oi-x'></span></button>
</script>
