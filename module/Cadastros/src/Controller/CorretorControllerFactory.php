<?php
namespace Cadastros\Controller;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class CorretorControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null){
        //$dbAdapter = $container->get('DbAdapter');
        $dbAdapter = null;
        return new CorretorController($dbAdapter);
    }
}

