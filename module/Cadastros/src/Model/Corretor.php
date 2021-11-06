<?php
namespace Cadastros\Model;

use Application\Model\ModelInterface;
use Laminas\Filter\FilterChain;
use Laminas\I18n\Filter\Alpha;
use Laminas\Filter\StripTags;
use Laminas\Filter\StringToUpper;

class Corretor implements ModelInterface
{
    public int $matricula;
    public string $nome;
    
    public function __construct(array $data){
       $this->exchangeArray($data);
    }
    
    public function exchangeArray(array $data)
    {
        $this->matricula = (int)($data['matricula'] ?? 0);
        $nome = ($data['nome'] ?? '');
        $filterChain = new FilterChain();
        $filterChain->attach(new Alpha(true))
        ->attach(new StringToUpper());
        $this->nome = $filterChain->filter($nome);
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

