<?php
namespace Djessy\NlTools;

class Kenteken
{
    /**
     * Format a Dutch licensplate code.
     *
     * @param string $kenteken The licensplate to validate.
     * @return bool True when the licensplate is valid.
     */
    public function validateKenteken($kenteken)
    {
    $regex = "/^(?:[A-Z]{2}[0-9]{2}[0-9]{2}|[0-9]{2}[0-9]{2}[A-Z]{2}|[0-9]{2}[A-Z]{2}[0-9]{2}|[A-Z]{2}[0-9]{2}[A-Z]{2}|[A-Z]{2}[A-Z]{2}[0-9]{2}|[0-9]{2}[A-Z]{2}[A-Z]{2}|[0-9]{2}[A-Z]{3}[0-9]|[0-9][A-Z]{3}[0-9]{2}|[A-Z]{2}[0-9]{3}[A-Z]|[A-Z][0-9]{3}[A-Z]{2}|[A-Z]{3}[0-9]{2}[A-Z])$/";
    $unspacedKenteken = str_replace(" ", "", $kenteken);
    $removedlinesKenteken = str_replace("-", "", $unspacedKenteken);

    if (preg_match($regex, $removedlinesKenteken)) {
            return true;
        } else {
            return false;
        }
    }
}