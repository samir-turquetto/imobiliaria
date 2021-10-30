<?php
namespace Cadastros\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;

class CorretorTable
{
    private TableGatewayInterface $tableGateway;
    
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function gravar(Corretor $corretor)
    {
        $set = $corretor->toArray();
        $this->tableGateway->insert($set);
    }
    
    public function listar()
    {
        return $this->tableGateway->select();
    }
}

