<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $cssstylepath ?>">
<?xml-stylesheet href="<?php echo $xmlstylepath ?>"?>
</head>
<body>
<?php
require_once('assets/config.php');

$xml = "
<factuur>
 <id>55924</id>
 <klant_id>123370</klant_id>
 <betaalstatus>openstaand</betaalstatus>

 <factuurnummer_voorloop>2010</factuurnummer_voorloop>
 <factuurnummer>1111</factuurnummer>
 <automatische_incasso>ja</automatische_incasso>
 <factuurdatum>2005-02-06</factuurdatum>

 <factuurregel>
  <id>319</id>
  <aantal>1.00</aantal>
  <omschrijving>Domeinnaam aangepast12</omschrijving>
  <prijs>40.000</prijs>
  <btw>0.190</btw>
 </factuurregel>

 <factuurregel>
  <id>320</id>
  <aantal>1.00</aantal>
  <omschrijving>Hosting aangepast</omschrijving>
  <prijs>150.000</prijs>
  <btw>0.190</btw>
 </factuurregel>
</factuur>";

// url naar waar de xml gepost moet worden
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/factuur_updaten";
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
