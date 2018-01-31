<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<?xml-stylesheet href="style.xls"?>
</head>
<body>
<?php
require_once('config.php');

// product update
$xml = "
<product>
 <id>2886</id>
 <naam>Hosting</naam>
 <nummer>1234</nummer>
 <omschrijving>Hosting pakket Pro</omschrijving>
 <prijs>15.50</prijs>
 <btw>21</btw>
</product>
";

// url naar waar de xml gepost moet worden
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/product_updaten";
$ch = curl_init();

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,"xml=" . urlencode($xml));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL,$url);

$result= curl_exec ($ch);
curl_close ($ch);
echo $result;
die();

?></body>
