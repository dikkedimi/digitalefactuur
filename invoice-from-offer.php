<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $cssstylepath ?>">
<?xml-stylesheet href="<?php echo $xmlstylepath ?>"?>
</head>
<body>
<?php
require_once('assets/config.php');
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
