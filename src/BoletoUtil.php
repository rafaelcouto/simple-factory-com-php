<?php declare(strict_types=1);

namespace SimpleFactory;

class BoletoUtil {
    
    public static function modulo11($n, $factor = 2, $base = 9, $x10 = 0, $resto10 = 0) : int
    {
        $sum = 0;
        for ($i = strlen((string)$n); $i > 0; $i--) {
            $sum += ((int) substr((string)$n, $i - 1, 1))*$factor;
            if ($factor == $base) {
                $factor = 1;
            }
            $factor++;
        }

        if ($x10 == 0) {
            $sum *= 10;
            $digito = $sum%11;
            if ($digito == 10) {
                $digito = $resto10;
            }
            return $digito;
        }
        return $sum%11;
    }

}
