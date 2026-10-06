<?php
namespace Djessy\NlTools;

class Iban {
    /**
     * Format a Dutch bank code.
     *
     * @param string $iban The bank code to validate.
     * @return bool True when the bank code is valid.
     */
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
