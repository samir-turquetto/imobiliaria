<?php
namespace Application\Model;

use Laminas\Authentication\AuthenticationService;
use Laminas\Authentication\Adapter\DbTable\CredentialTreatmentAdapter;
use Laminas\Db\Adapter\AdapterInterface;

class Usuario implements ModelInterface
{
    public $usuario;
    public $senha;
    
    public function exchangeArray(array $data)
    {
        $this->usuario = ($data['usuario'] ?? '');
        $this->senha = ($data['senha'] ?? '');
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public function __construct(array $data)
    {
        $this->exchangeArray($data);
    }
    
    public function autenticado(AdapterInterface $dbAdapter): bool
    {
        $authenticationService = new AuthenticationService();
        
        $authAdapter = new CredentialTreatmentAdapter($dbAdapter);        
        $authAdapter->setTableName('usuarios')
        ->setIdentityColumn('usuario')
        ->setCredentialColumn('senha');
        
        error_log("usuario: {$this->usuario} Senha: {$this->senha}");
        
        $authAdapter->setIdentity($this->usuario)
        ->setCredential(md5($this->senha));
        
        $authenticationService->setAdapter($authAdapter);
        
        $result = $authenticationService->authenticate();
        
        return $result->isValid();        
    }
}

