<?php

namespace Cadastros\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;

class ImovelTable
{
    private TableGatewayInterface $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function gravar(Imovel $imoveis)
    {
        $set = $imoveis->toArray();
        if (isset($set['matricula']) && !empty($set['matricula'])) {
            return $this->tableGateway->update($set, ['matricula' => $set['matricula']]);
        }
        $this->tableGateway->insert($set);
    }

    public function listar()
    {
        return $this->tableGateway->select();
    }

    public function apagar(int $imovelId)
    {
        $this->tableGateway->delete(['matricula' => $imovelId]);
    }

    public function apagarPorNome(string $nome)
    {
        $this->tableGateway->delete(['nome' => $nome]);
    }

    public function buscar(int $imovelId): Imovel
    {
        $imoveis = $this->tableGateway->select(['matricula' => $imovelId]);
        if ($imoveis->count() != 0) {
            return $imoveis->current();
        }
        return new Imovel([]);
    }

    public function buscarPorNome($nome): Imovel
    {
        $imoveis = $this->tableGateway->select(['nome' => $nome]);
        if ($imoveis->count() != 0) {
            return $imoveis->current();
        }
        return new Imovel([]);
    }
}