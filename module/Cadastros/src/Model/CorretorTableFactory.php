<?php
namespace Cadastros\Model;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\Db\ResultSet\ResultSet;

class CorretorTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $adapter = $container->get('DbAdapter');
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Corretor([]));
        $tableGateway = new TableGateway('corretores', $adapter, null, $resultSetPrototype);
        $corretorTable = new CorretorTable($tableGateway);
        return $corretorTable;
    }

}

