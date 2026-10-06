<?php
namespace Djessy\NlTools;

class Kenteken
{
    public function validateKenteken($kenteken)
    {
    $regex = "/^(?:[A-Z]{2}[0-9]{2}[0-9]{2}|[0-9]{2}[0-9]{2}[A-Z]{2}|[0-9]{2}[A-Z]{2}[0-9]{2}|[A-Z]{2}[0-9]{2}[A-Z]{2}|[A-Z]{2}[A-Z]{2}[0-9]{2}|[0-9]{2}[A-Z]{2}[A-Z]{2}|[0-9]{2}[A-Z]{3}[0-9]|[0-9][A-Z]{3}[0-9]{2}|[A-Z]{2}[0-9]{3}[A-Z]|[A-Z][0-9]{3}[A-Z]{2}|[A-Z]{3}[0-9]{2}[A-Z])$/";
    $unspacedKenteken = str_replace(" ", "", $kenteken);

    if (preg_match($regex, $unspacedKenteken)) {
            return true;
        } else {
            return false;
        }
    }
}