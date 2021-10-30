<?php
namespace Cadastros\Model;

class Corretor
{
    public int $matricula;
    public string $nome;
    
    public function __construct(array $data){
        $this->matricula = ($data['matricula'] ?? 0);
        $this->nome = ($data['nome'] ?? '');
    }
    
    public function toArray()
    {
        $attributes = get_object_vars($this);
        if ($attributes['matricula'] == 0){
            unset($attributes['matricula']);
        }
        return $attributes;
    }
}

