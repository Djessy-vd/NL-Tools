<?php
namespace Djessy\NlTools;

class Iban {
    public function validateIban($iban) {
        $regex = "/^NL[0-9]{2}[A-Z]{4}[0-9]{10}$/";
        $unspacedIban = str_replace(" ", "", $iban);

        if (preg_match($regex, $unspacedIban)) {
            return true;
        } else {
            return false;
        }
    }
}
