<?php
/**
     * validate a Dutch btw number code.
     *
     * @param string $btw The btw number to validate.
     * @return bool True when the btw number is valid.
     */
namespace Djessy\NlTools;

class Btw
{
    public function validateBtw($btw){
        
        $regex = "/^NL[0-9]{9}B[0-9]{2}$/";
        $unspacedBtw = str_replace(" ", "", $btw);

        if (preg_match($regex, $unspacedBtw)) {
            return true;
        } else {
            return false;
        }
    }
}