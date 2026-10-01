<?php 
require "vendor/autoload.php";

//----------------------------------------
//test for postcode validation and formatting

echo "---------------------Postcode test---------------------<br><br><br><br>";

use Djessy\NlTools\Postcode;

$postcode = new Postcode();

echo "--------------------------------<br>";

echo "test postcode validation<br>";
echo "--------------------------------<br>";
var_dump($postcode->validatePostalCode("1122AB"));
echo "1122AB";
echo "<br>";
var_dump($postcode->validatePostalCode("1122 AB"));
echo "1122 AB";
echo "<br>";
var_dump($postcode->validatePostalCode("12a"));
echo "12a";
echo "<br>";
var_dump($postcode->validatePostalCode("139SN"));
echo "139SN";
echo "<br>";
echo "--------------------------------<br>";

echo "test postcode formatting<br>";
echo "--------------------------------<br>";
var_dump($postcode->formatPostalCode("1122AB"));
echo "1122AB";
echo "<br>";
var_dump($postcode->formatPostalCode("1122 ab"));
echo "1122 ab";
echo "<br>";
var_dump($postcode->formatPostalCode("12a"));
echo "12a";
echo "<br>";
var_dump($postcode->formatPostalCode("139SN"));
echo "139SN";
echo "<br>";
echo "--------------------------------<br>";
?>