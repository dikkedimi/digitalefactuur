<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $cssstylepath ?>">
<?xml-stylesheet href="<?php echo $xmlstylepath ?>"?>
</head>
<body>
<?php
require_once('assets/config.php');
// betaling ongedaan maken
$xml = "
<factuur>
 <id>9595</id>
</factuur>";

// url naar waar de xml gepost moet worden
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/factuur_betaling_ongedaan_maken";
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
