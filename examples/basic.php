<?php declare(strict_types=1);

$codigoBanco = (int) readline('Informe o codigo do banco: ');
$numero = (int) readline('Informe o numero: ');
$carteira = (string) readline('Informe a carteira: ');
$nossoNumero = null;

function modulo11($n, $factor = 2, $base = 9, $x10 = 0, $resto10 = 0) : int
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

switch ($codigoBanco) {
    case 33:
        $nossoNumero = str_pad((string) $numero, 12, '0', STR_PAD_LEFT);
        $dv = modulo11((string) $numero);
        break;
    case 237:
        $nossoNumero = str_pad((string) $numero, 11, '0', STR_PAD_LEFT);
        $dv = modulo11($carteira . $nossoNumero, 2, 7, 0, 'P');
        break;
    default:
        throw new Exception('Banco não implementado');
}

echo "Nosso numero: {$nossoNumero}-{$dv}" . PHP_EOL;
