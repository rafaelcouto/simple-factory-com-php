<?php declare(strict_types=1);

namespace SimpleFactory;

abstract class AbstractBoleto {

    protected int $codigoBanco;
    protected int $numero;
    protected string $carteira;

    public function __construct(array $data = []) {
        $this->setNumero($data['numero'] ?? 0);
        $this->setCarteira($data['carteira'] ?? '');
    }

    public function getNumero() : int {
        return $this->numero;
    }

    public function setNumero(int $numero) {
        $this->numero = $numero;
    }

    public function getCarteira() : string {
        return $this->carteira;
    }

    public function setCarteira(string $carteira) {
        $this->carteira = $carteira;
    }
    
    abstract public function getNossoNumero() : string;
    abstract public function getNossoNumeroDv() : string;
}
