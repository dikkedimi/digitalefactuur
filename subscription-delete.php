<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $cssstylepath ?>">
<?xml-stylesheet href="<?php echo $xmlstylepath ?>"?>
</head>
<body>
<?php
require_once('assets/config.php');
// url om de klanten op te halen
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/abonnement_verwijderen&abonnement_id=3684";

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
?>
</body>
