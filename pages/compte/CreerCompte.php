<link rel="stylesheet" href="public/css/creerCompte.css">

<div class="container">
    <div class="col-12">
        <br/>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Nouveau client</h4>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    <table class="mx-auto">
                        <tr>
                            <td><label>Nom : <span class="req">*</span></label></td>
                            <td><input type="text" id="nom" class="form-control required" placeholder="Nom" name="nom"></td>
                        </tr>
                        <tr>
                            <td><label class="mr-5">Prénom : <span class="req">*</span></label></td>
                            <td><input type="text" id="prenom" class="form-control required" placeholder="Prénom" name="prenom"></td>
                        </tr>
                        <tr>
                            <td><label class="mr-5">Nom d'utilisateur : <span class="req">*</span></label></td>
                            <td><input type="text" id="username" class="form-control required" placeholder="Nom d'utilisateur" name="username"></td>
                        </tr>

                        <tr><td><br></td></tr>

                        <tr>
                            <td><label class="mr-5">Mail :</label></td>
                            <td><input type="text" id="mail" class="form-control" placeholder="Email" name="mail"></td>
                        </tr>
                        <tr>
                            <td><label class="mr-5">Téléphone :</label></td>
                            <td><input type="text" id="tel" class="form-control" placeholder="Tel" name="tel"></td>
                        </tr>

                        <tr><td><br></td></tr>
                        
                        <tr>
                            <td><label class="mr-5">Mot de passe : <span class="req">*</span></label></td>
                            <td><input type="password" id="password" class="form-control required" placeholder="Mot de passe" name="password"></td>
                        </tr>
                        <tr>
                            <td><label class="mr-5">Confirmation : <span class="req">*</span></label></td>
                            <td><input type="password" id="confirm" class="form-control required" placeholder="Confirmation" name="confirm"></td>
                        </tr>
                    </table>
                    <br/>
                    <div class="form-inline justify-content-center">
                        <input type="submit" class="form-control btn-success" value="Créer mon compte">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
