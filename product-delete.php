<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<?xml-stylesheet href="style.xls"?>
</head>
<body>
<?php
require_once('config.php');

// url om product te verwijderen
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/product_verwijderen&products_id=1234";
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
