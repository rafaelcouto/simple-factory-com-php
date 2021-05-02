<?php declare(strict_types=1);

namespace SimpleFactory;

class ReflectionUtil {
    
    /**
     * @return \ReflectionClass[]
     */
    public static function getReflectionClassesFromFolder(string $folder, string $namespace) : array
    {
        $reflectionClasses = [];

        // Buscando os arquivos da pasta Banco e ignorando os caminhos '.' e '..'
        $files = array_diff(scandir($folder), ['.', '..']);
        
        foreach ($files as $file) {
            
            // Retirando a extensão do nome do arquivo
            $fileNameWithoutExtension = pathinfo($file, PATHINFO_FILENAME);

            // Descobrindo o nome da classe
            $className = $namespace . '\\' . $fileNameWithoutExtension;

            // Armazenando objeto com informações da classe
            $reflectionClasses[] = new \ReflectionClass($className);

        }

        return $reflectionClasses;
    }

}
