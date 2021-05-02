<?php declare(strict_types=1);

namespace SimpleFactory;

use SimpleFactory\AbstractBoleto;
use SimpleFactory\Banco\Santander;
use SimpleFactory\Banco\Bradesco;

final class BoletoFactory {

    public function create(int $codigoBanco, array $data = []) : AbstractBoleto {

        switch($codigoBanco) {
            case BancoEnum::SANTANDER:
                return new Santander($data);
            case BancoEnum::BRADESCO:
                return new Bradesco($data);
        }

        throw new \Exception('Banco não implementado');

    }

}
