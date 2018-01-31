<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $cssstylepath ?>">
<?xml-stylesheet href="<?php echo $xmlstylepath ?>"?>
</head>
<body>
<?php
require_once('assets/config.php');

// periodiek updaten
$xml = "
<periodiek>
 <klant_relatienummer>1</klant_relatienummer>
 <klant_naam>DigitaleFactuur</klant_naam>
 <klant_contactpersoon_naam>Ravi Chotkan</klant_contactpersoon_naam>
 <klant_email>support@digitalefactuur.nl</klant_email>
 <klant_adres>Haagweg 4G5</klant_adres>
 <klant_postcode>2311 AA</klant_postcode>
 <klant_plaats>Leiden</klant_plaats>
 <klant_telefoonnummer>071 513 89 85</klant_telefoonnummer>

 <btw_verlegd>ja</btw_verlegd>
 <periode>kwartaal</periode>
 <id>6893</id>
 <periodiekregel>
  <id>320</id>
  <aantal>1.00</aantal>
  <omschrijving>Hosting</omschrijving>
  <prijs>150.000</prijs>
  <btw>0.190</btw>
 </periodiekregel>
</periodiek>";

// url naar waar de xml gepost moet worden
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/periodiek_updaten";
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
