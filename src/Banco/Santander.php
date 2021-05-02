<?php declare(strict_types=1);

namespace SimpleFactory\Banco;

use SimpleFactory\AbstractBoleto;
use SimpleFactory\BancoEnum;
use SimpleFactory\BoletoUtil;

class Santander extends AbstractBoleto
{
    protected int $codigoBanco = BancoEnum::SANTANDER;

    public function getNossoNumero() : string
    {
        return str_pad((string) $this->getNumero(), 12, '0', STR_PAD_LEFT);
    }

    public function getNossoNumeroDv(): string
    {
        return (string) BoletoUtil::modulo11((string) $this->getNumero());
    }
        
}
