<?php
namespace Cadastros\Model;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Db\TableGateway\TableGateway;

class CorretorTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $adapter = $container->get('DbAdapter');
        $tableGateway = new TableGateway('corretores', $adapter);
        $corretorTable = new CorretorTable($tableGateway);
        return $corretorTable;
    }

}

