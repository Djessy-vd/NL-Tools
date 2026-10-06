<?php
namespace Djessy\NlTools;

class Postcode {
    /**
     * Validates a Dutch postal code.
     *
     * @param string $postal The postal code to validate.
     * @return bool True when the postal code is valid.
     */
    public function validatePostalCode($postal) {
        //regex minimum 4 digits and 2 letters, with optional space in between
        $regex = "/^[1-9][0-9]{3}\s?[a-zA-Z]{2}$/";

        if (preg_match($regex, $postal)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Format a Dutch postal code.
     *
     * @param string $postal The postal code to format.
     * @return bool True when the postal code is valid.
     */
    public function formatPostalCode($postal){
        $info = $this->validatePostalCode($postal);

        if ($info) {
            $removedspace = str_replace(" ", "", $postal);
            $capitalized = strtoupper($removedspace);
            $formatted = substr($capitalized, 0, 4 ) . " " . substr($capitalized, 4, 2);
            return $formatted;
        } else {
            return false;
        }
    }
}