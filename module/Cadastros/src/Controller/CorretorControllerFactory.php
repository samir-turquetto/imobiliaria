<?php
namespace Cadastros\Controller;

use Laminas\ServiceManager\Factory\FactoryInterface;

class CorretorControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null){
        $dbAdapter = $container->get('DbAdapter');
        return new CorretorController($dbAdapter);
    }
}

