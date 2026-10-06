<?php

namespace Djessy\NlTools;

class Telefoonnummer
{
    /**
     * Format a Dutch phone number code.
     *
     * @param string $telefoonnummer The phone number code to validate.
     * @return bool True when the phone number is valid.
     */
    public function validateTelefoonnummer($telefoonnummer)
    {
        $regex = "/^(06[0-9]{8}|\+316[0-9]{8})$/";
        $unspacedTelefoonnummer = str_replace([" ", "-"], "", $telefoonnummer);

        if (preg_match($regex, $unspacedTelefoonnummer)) {
            return true;
        } else {
            return false;
        }
    }
}