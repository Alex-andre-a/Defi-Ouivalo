<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message API</title>

    <!-- FRAMEWORK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- CSS & JS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php

    $gateway_url = "https://script.google.com/macros/s/AKfycby-TJmFFUFTfiNUbMoSIZx8LVtiskQ-bUt4xO6hmrU0XQpJS8IPUBow/exec";
    
    $action = "send-message";
    
    $apiKey  = "CLE-TEST-IOT";
    
    $senderID  = "alexandre.arfini@gmail.com";

    $date = "15/09/2022";

    $urlRelais = "https://github.com/Alex-andre-a/Defi-Ouivalo";
    
    $message  = "Bonjour j'espère que vous avez bien reçu mon message et que le défi est bien validé :)";
    
     
    $data = array('action' => $action,
                  'api_key' => $apiKey,
                  'from' => $senderID,
                  'from' => $date,
                  'from' => $urlRelais,
                  'sms' => $message,
    );
    
    $ch = curl_init($gateway_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $get_data = json_decode($response, true);
    
    
    if($get_data['code'] === 'ok'){
        echo 'Le SMS a bien été envoyé';
    } else {
        echo 'Code Erreur : '.$get_data['code'].' -- '.$get_data['message'];
    }
    
    ?>
</body>

</html>