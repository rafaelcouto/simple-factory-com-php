<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use SimpleFactory\BancoEnum;
use SimpleFactory\Banco\Santander;
use SimpleFactory\Banco\Bradesco;

$codigoBanco = (int) readline('Informe o codigo do banco: ');

$data = [
    'numero' => (int) readline('Informe o numero: '),
    'carteira' => (string) readline('Informe a carteira: ')
];

switch ($codigoBanco) {
    case BancoEnum::SANTANDER:
        $boleto = new Santander($data);
        break;
    case BancoEnum::BRADESCO:
        $boleto = new Bradesco($data);
        break;
    default:
        throw new Exception('Banco não implementado');
}

echo "Nosso numero: {$boleto->getNossoNumero()}-{$boleto->getNossoNumeroDv()}" . PHP_EOL;
