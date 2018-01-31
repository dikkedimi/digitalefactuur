<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<?xml-stylesheet href="style.xls"?>
</head>
<body>
<?php
require_once('config.php');
// url om de klanten op te halen
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/facturen&page=1&order_column=factuurnummer&order_type=desc";

/* eventuele parameters
 .......&facturen_id=9595";
 .......&betaalstatus=openstaand";
 .......&betaalstatus=betaald";
 .......&factuurnummer=2004160";
*/

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);

// curlen en resultaat opvangen in $xml
$xml = curl_exec($ch);
curl_close($ch);

// controleren of een fout is opgetreden (begint altijd met een foutcode)
if(is_numeric(substr($xml, 0, 3)))
{
	die("<b>Foutmelding van DigitaleFactuur</b>:<br />" . $xml);
}

if(!empty($xml))
{
	// de xml inlezen in een XML object van PHP
	$xml_obj = new SimpleXMLElement($xml);
	print_r($xml_obj);
}

?>
</body>
