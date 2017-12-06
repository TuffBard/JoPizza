<?php
    session_start();
    use App\Table\Commande;
    //Connexion à Stripe
    \Stripe\Stripe::setApiKey("sk_test_l1DL9xhQWorSn0weoNSxKLCa");

    $token = $_POST['token'];

    try {
        if(isset($_SESSION["commande"]) && isset($_POST["total"])){
            $total = $_POST["total"] * 100;
            $commande = $_SESSION["commande"];
            //Effectue le paiement -> Renvoi une exception si erreur
            $charge = \Stripe\Charge::create(array(
            "amount" => $total,
            "currency" => "eur",
            "description" => "Example charge",
            "source" => $token,
            ));
            //Passe le statut de la commande à "Paiement validé"
            Commande::setStatus($commande, 2);
            echo "success";
        }
    } catch(Exception $e){
        //Renvoi un message d'erreur si le paiement à échoué.
        $mess = "";
        switch($e->getMessage()){
            case "Your card has expired.":
                $mess = "La carte a expirée.";
                break;
            case "Your card's security code is incorrect.":
                $mess = "Le code de sécurité est incorrect";
                break;
            case "Your card was declined.":
                $mess = "Le paiement a été refusé.";
                break;
            case "An error occurred while processing your card. Try again in a little bit.":
            default:
                //echo $e->getMessage() . "<br>";
                $mess = "Une erreur est survenue lors du paiement.";
        }
        echo "<div class='alert alert-danger' role='alert'>$mess</div>";
    }
 ?>
