<?php
namespace Application\Model;

interface ModelInterface
{
    public function __construct(array $data);
    
    public function exchangeArray(array $data);
    
    public function toArray();
}

