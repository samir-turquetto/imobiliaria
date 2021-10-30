<?php

declare(strict_types=1);

namespace Cadastros\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Laminas\Db\Adapter\AdapterInterface;
use Cadastros\Model\Corretor;
use Cadastros\Model\CorretorTable;

class CorretorController extends AbstractActionController
{
    private CorretorTable $corretorTable;
    
    public function __construct(CorretorTable $corretorTable)
    {
        $this->corretorTable = $corretorTable;
    }
    
    public function indexAction()
    {
        $corretores = $this->corretorTable->listar();        
        return new ViewModel([
            'corretores' => $corretores
        ]);
    }
    
    public function editarAction()
    {
        $matricula = (int) $this->params('matricula');
        $corretor = $this->corretorTable->buscar($matricula);        
        
        return new ViewModel([
            'corretor' => $corretor
        ]);
    }
    
    public function gravarAction()
    {
        $corretor = new Corretor($_POST);
        $this->corretorTable->gravar($corretor);
        
        return $this->redirect()->toRoute('cadastros',[
            'controller' => 'corretor',
            'action'     => 'index'
        ]);
    }
    
    public function apagarAction()
    {
        $matricula = (int) $this->params('matricula');
        $this->corretorTable->apagar($matricula);
        return $this->redirect()->toRoute('cadastros',[
            'controller' => 'corretor',
            'action'     => 'index'
        ]);
    }
    
    
    
    
    
    
    
    
    
}
