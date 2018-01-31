<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<?xml-stylesheet href="style.xls"?>
</head>
<body>
<?php
require_once('config.php');

// factuur versturen per post
$xml = "
<factuur>
 <id>9595</id>
 <sjablonen_id>859</sjablonen_id>
 <methode>post</methode>
 <post_type>kleur</post_type>
 <klant_naam>Ravi Chotkan</klant_naam>
 <klant_adres>Haagweg 4G5</klant_adres>
 <klant_postcode>2311AA</klant_postcode>
 <klant_plaats>Leiden</klant_plaats>
</factuur>";

// url naar waar de xml gepost moet worden
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/factuur_versturen";
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
