<?php declare(strict_types=1);

namespace SimpleFactory;

use SimpleFactory\AbstractBoleto;

final class BoletoFactoryImproved {

    public function create(int $codigoBanco, array $data = []) : AbstractBoleto {

        $reflectionClasses = ReflectionUtil::getReflectionClassesFromFolder(__DIR__ . '/Banco', __NAMESPACE__ . '\\Banco');

        foreach ($reflectionClasses as $reflectionClass) {
            
            $defaultProperties = $reflectionClass->getDefaultProperties();

            // Se a propriedade 'codigoBanco' for igual ao código que estamos buscando
            if ($defaultProperties['codigoBanco'] && $defaultProperties['codigoBanco'] === $codigoBanco) {

                // Retornando uma instancia dessa classe
                $className = $reflectionClass->getName();
                return new $className($data);

            }
        }

        throw new \Exception('Banco não implementado');
    }

}
