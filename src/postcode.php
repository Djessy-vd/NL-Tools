<?php
namespace Djessy\NlTools;

//test
$postal = "1122AS";

class Postcode {
public function validatePostalCode($postal) {
    //regex minimum 4 digits and 2 letters, with optional space in between
    $regex = "/^[1-9][0-9]{3}\s?[a-zA-Z]{2}$/";

    if (preg_match($regex, $postal)) {
        return true;
    } else {
        return false;
    }
}
}

$postcode = new Postcode();

echo $postcode->validatePostalCode($postal);