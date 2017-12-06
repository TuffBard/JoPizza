<?php

    \Stripe\Stripe::setApiKey("sk_test_l1DL9xhQWorSn0weoNSxKLCa");

    //\Stripe\Stripe::setClientId("cus_BtTr3BIbwt4OJJ");

    $token = $_POST['token'];

    try{
        $charge = \Stripe\Charge::create(array(
        "amount" => 1000,
        "currency" => "eur",
        "description" => "Example charge",
        "source" => $token,
        ));

        //Do success payment !
    } catch(Exception $e){
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
        echo "<label style='color:red;'>$mess</label>";
    }

    // var_dump($charge);
 ?>
