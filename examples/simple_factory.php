<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use SimpleFactory\BoletoFactory;

$codigoBanco = (int) readline('Informe o codigo do banco: ');

$data = [
    'numero' => (int) readline('Informe o numero: '),
    'carteira' => (string) readline('Informe a carteira: ')
];

$boletoFactory = new BoletoFactory();
$boleto = $boletoFactory->create($codigoBanco, $data);

echo "Nosso numero: {$boleto->getNossoNumero()}-{$boleto->getNossoNumeroDv()}" . PHP_EOL;
