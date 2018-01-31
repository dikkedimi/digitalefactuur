<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $cssstylepath ?>">
<?xml-stylesheet href="<?php echo $xmlstylepath ?>"?>
</head>
<body>
<?php
require_once('assets/config.php');
// klant insert
$xml = "
<klant>
 <relatienummer>123456789</relatienummer>
 <type>debiteur</type>
 <naam>API TEST</naam>
 <contactpersoon_naam>Ravi Chotkan</contactpersoon_naam>
 <contactpersoon_afdeling>HQ</contactpersoon_afdeling>
 <contactpersoon_email>support@digitalefactuur.nl</contactpersoon_email>
 <adres>Haagweg 4G5</adres>
 <postcode>2311 AA</postcode>
 <plaats>Leiden</plaats>
 <rekeningnummer>123456789</rekeningnummer>
 <tenaamstelling>Ravi Chotkan</tenaamstelling>
</klant>
";

// url naar waar de xml gepost moet worden
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/klant_aanmaken";
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
