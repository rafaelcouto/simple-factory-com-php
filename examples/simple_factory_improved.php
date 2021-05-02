<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use SimpleFactory\BoletoFactoryImproved;

$codigoBanco = (int) readline('Informe o codigo do banco: ');

$data = [
    'numero' => (int) readline('Informe o numero: '),
    'carteira' => (string) readline('Informe a carteira: ')
];

$boletoFactoryImproved = new BoletoFactoryImproved();
$banco = $boletoFactoryImproved->create($codigoBanco, $data);

echo "Nosso numero: {$banco->getNossoNumero()}-{$banco->getNossoNumeroDv()}" . PHP_EOL;
