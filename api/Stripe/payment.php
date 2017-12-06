<?php

    \Stripe\Stripe::setApiKey("pk_test_CB9CBhMYCjxMmp6fj1oeealm");

    //\Stripe\Stripe::setClientId("cus_BtTr3BIbwt4OJJ");

    $token = $_POST['token'];

    $charge = \Stripe\Charge::create(array(
    "amount" => 1000,
    "currency" => "eur",
    "description" => "Example charge",
    "source" => $token,
    ));

    var_dump($charge);
 ?>
