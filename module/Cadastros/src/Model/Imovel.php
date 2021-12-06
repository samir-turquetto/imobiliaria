<?php

namespace Cadastros\Model;

use Application\Model\ModelInterface;

class Imovel implements ModelInterface
{
    public int $matricula;
    public string $nome;

    public function __construct(array $data)
    {
        $this->exchangeArray($data);
    }

    public function exchangeArray(array $data)
    {
        $this->matricula = (int)($data['matricula'] ?? 0);
        $this->nome = ($data['nome'] ?? '');
    }

    public function toArray()
    {
        $attributes = get_object_vars($this);
        if ($attributes['matricula'] == 0) {
            unset($attributes['matricula']);
        }
        return $attributes;
    }
}