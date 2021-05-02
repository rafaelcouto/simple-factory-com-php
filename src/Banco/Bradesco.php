<?php declare(strict_types=1);

namespace SimpleFactory\Banco;

use SimpleFactory\AbstractBoleto;
use SimpleFactory\BancoEnum;
use SimpleFactory\BoletoUtil;

class Bradesco extends AbstractBoleto
{
    protected int $codigoBanco = BancoEnum::BRADESCO;

    public function getNossoNumero() : string 
    {
        return str_pad((string) $this->getNumero(), 11, '0', STR_PAD_LEFT);
    }

    public function getNossoNumeroDv(): string
    {
        return (string) BoletoUtil::modulo11($this->getCarteira() . $this->getNossoNumero(), 2, 7, 0, 'P');
    }
}
