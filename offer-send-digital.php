<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<?xml-stylesheet href="style.xls"?>
</head>
<body>
<?php
require_once('config.php');

// offerte versturen per email
$xml = "
<offerte>
 <id>2664</id>
 <email_tekst>dit is een test</email_tekst>
 <email>support@digitalefactuur.nl</email>
</offerte>";

// url naar waar de xml gepost moet worden
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/offerte_versturen";
$ch = curl_init();

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"xml=" . urlencode($xml));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL,$url);

$result= curl_exec ($ch);
curl_close ($ch);
echo $result;
die();

?>
</body>
