<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $cssstylepath ?>">
<?xml-stylesheet href="<?php echo $xmlstylepath ?>"?>
</head>
<body>
<?php
require_once('assets/config.php');
// factuur aanmaken (bestaande klant: klant_id meegeven)
$xml = "
<factuur>
 <id>160</id>
 <klant_naam>Ravi Chotkan</klant_naam>
 <klant_email>support@digitalefactuur.nl</klant_email>
 <update_klanten_veld>email</update_klanten_veld>

 <factuurnummer>2004163</factuurnummer>
 <automatische_incasso>nee</automatische_incasso>
 <factuurdatum>02-06-2010</factuurdatum>
 <vervaldatum>25-07-2010</vervaldatum>

 <factuurregel>
  <id>319</id>
  <aantal>1.00</aantal>
  <omschrijving>Domeinnaam</omschrijving>
  <prijs>40.000</prijs>
  <btw>0.190</btw>
 </factuurregel>

 <factuurregel>
  <id>320</id>
  <aantal>1.00</aantal>
  <omschrijving>Hosting</omschrijving>
  <prijs>150.000</prijs>
  <btw>0.190</btw>
 </factuurregel>
</factuur>";

// url naar waar de xml gepost moet worden
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/factuur_aanmaken";
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
