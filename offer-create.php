<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $cssstylepath ?>">
<?xml-stylesheet href="<?php echo $xmlstylepath ?>"?>
</head>
<body>
<?php
require_once('assets/config.php');

// offerte aanmaken
$xml = "
<offerte>
 <klant_naam>Ravi Chotkan</klant_naam>
 <klant_email>support@digitalefactuur.nl</klant_email>

 <offertenummer>2004163</offertenummer>
 <offertedatum>2004-02-06</offertedatum>
 <offerteregel>
  <aantal>1.00</aantal>
  <omschrijving>Domeinnaam</omschrijving>
  <prijs>40.000</prijs>
  <btw>0.190</btw>
 </offerteregel>

 <offerteregel>
  <aantal>1.00</aantal>
  <omschrijving>Hosting</omschrijving>
  <prijs>150.000</prijs>
  <btw>0.190</btw>
 </offerteregel>

 <introductie>
  <volgorde>2</volgorde>
  <tekst>tekst 2</tekst>
 </introductie>

 <introductie>
  <volgorde>1</volgorde>
  <tekst>tekst 1</tekst>
 </introductie>

 <toelichting>
  <volgorde>1</volgorde>
  <tekst>gedaan</tekst>
 </toelichting>

</offerte>";

// url naar waar de xml gepost moet worden
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/offerte_aanmaken";
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
