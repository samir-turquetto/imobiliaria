<?php
namespace Cadastros\Model;

class Corretor
{
    public int $matricula;
    public string $nome;
    
    public function __construct(array $data){
        $this->matricula = ($data['matricula'] ?? null);
        $this->nome = ($data['nome'] ?? null);
    }
    
    public function toArray()
    {
        return get_object_vars($this);
    }
}

