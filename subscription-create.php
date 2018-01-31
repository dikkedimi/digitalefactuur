<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $cssstylepath ?>">
<?xml-stylesheet href="<?php echo $xmlstylepath ?>"?>
</head>
<body>
<?php
require_once('assets/config.php');
// abonnement aanmaken PHP (bestaande klant: klant_id meegeven)
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/$API_KEY/abonnement_aanmaken"; // abonnement_updaten
$xml = "
<abonnement>
 <id>3695</id>
 <klant_naam>Ravi Chotkan</klant_naam>
 <klant_email>support@digitalefactuur.nl</klant_email>
 <update_klanten_veld>email</update_klanten_veld>
 <referentie>1234TEST</referentie>
 <abonnement_type_id>12</abonnement_type_id>
 <btw_verlegd>ja</btw_verlegd>
</abonnement>";

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
