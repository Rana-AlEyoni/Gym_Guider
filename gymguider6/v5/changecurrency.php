<?php 
 session_start();
 if(isset($_GET["currency"])){
    $endpoint = 'latest';
    $access_key = 'd76fb7a1f33d2a878825d74f58155aeb';

    // Initialize CURL:
    $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
    $exchangeRates = json_decode($json, true);
     $value=$_GET["currency"];
       $_SESSION['local_currency']= $exchangeRates['rates'][$value];
       $_SESSION['currency_name']=$value;
       $_SESSION['currency']=$exchangeRates;
   }
?>