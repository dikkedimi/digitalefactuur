<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<?xml-stylesheet href="style.xls"?>
</head>
<body>
<?php
require_once('config.php');
// url om de klant te verwijderen
$url = "https://administratie.digitalefactuur.nl/api/$ACCOUNT_NUMBER/PASS/factuur_download&facturen_id=55924&download_type=base64";

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);

// curlen en resultaat opvangen
$pdf_string = curl_exec($ch);
curl_close($ch);


// controleren of een fout is opgetreden (begint altijd met een foutcode)
if(is_numeric(substr($pdf_string, 0, 3)))
{
	die("<b>Foutmelding van DigitaleFactuur</b>:<br />" . $pdf_string);
}

// u kunt de factuur vervolgens in een bestand wegschrijven
// opslaan als bestand
/*
$handle = fopen("test.pdf", "w+");
fwrite($handle, base64_decode($pdf_string));
fclose($handle);
*/

// verstuur PDF naar scherm
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename=factuur.pdf; ');
header("Cache-Control: public");
header("Pragma: public");
echo base64_decode($pdf_string);
exit();

?>
</body>
