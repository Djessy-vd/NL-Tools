<?php

namespace Djessy\NlTools;

class Telefoonnummer
{
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