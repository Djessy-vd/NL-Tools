<?php 
require "vendor/autoload.php";

use Djessy\NlTools\Postcode;

$postcode = new Postcode();
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
?>