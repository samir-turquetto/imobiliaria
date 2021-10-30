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
        if (isset($set['matricula']) && !empty($set['matricula'])){
            return $this->tableGateway->update($set,['matricula' => $set['matricula']]);
        }
        $this->tableGateway->insert($set);
    }
    
    public function listar()
    {
        return $this->tableGateway->select();
    }
    
    public function apagar(int $matricula)
    {
        $this->tableGateway->delete(['matricula' => $matricula]);
    }
    
    public function buscar(int $matricula): Corretor{
        $corretores = $this->tableGateway->select(['matricula' => $matricula]);
        if ($corretores->count() != 0){
            return $corretores->current();
        }
        return new Corretor([]);
    }
    
    
    
    
    
    
    
    
    
    
    
    
}

