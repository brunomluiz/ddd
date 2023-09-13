<?php

namespace App\Domain\Service;

class TaxIdentificationValidator
{
    public static function isValid(string $taxIdentification): bool
    {
        $taxIdentification = preg_replace('/[^0-9]/is', '', $taxIdentification);    
        
        if (strlen($taxIdentification) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $taxIdentification)) {
            return false;
        }        

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $taxIdentification[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($taxIdentification[$c] != $d) {
                return false;
            }
        }

        return true;
    }
}