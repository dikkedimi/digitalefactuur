<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<?xml-stylesheet href="style.xls"?>
</head>
<body>
<?php
require_once('config.php');
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/offerte_factuur_aanmaken&offerte_id=2663";

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);

// curlen en resultaat opvangen
$result = curl_exec($ch);
curl_close($ch);

echo $result;
exit();

?>
</body>
