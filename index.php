<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message API</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php

    $gateway_url = "";
    
    $action = "send-message";
    
    $apiKey  = "CLE-TEST-IOT";
    
    $senderID  = "";

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