<?php
require('stripe-php-master/init.php');

$publishableKey="pk_test_51IsgWVSC3mt3FAd3ISN73TtRUBed0cBAnfn2NkHQFdXu5oNaOWAKPCTMNBY09iyCErDDh3baxaPjoTiPF4cOx7d800GsQLM8X4";

$secretKey="sk_test_51IsgWVSC3mt3FAd3pDFfNTO4UPSjopzmnVqRMXRaQIwupq53w4qPOZbxWrxJzyjQrhpYGb4LT1A9f4QjaQ7OrUQl00NNqQG6hd";

\Stripe\Stripe::setApiKey($secretKey);
?>