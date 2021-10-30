<?php

declare(strict_types=1);

namespace Cadastros\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Laminas\Db\Adapter\AdapterInterface;

class CorretorController extends AbstractActionController
{
    private AdapterInterface $dbAdapter;
    
    public function __construct($dbAdapter = null)
    {
        //$this->dbAdapter = $dbAdapter;
    }
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function editarAction()
    {
        return new ViewModel();
    }
    
    public function gravarAction()
    {
        return $this->redirect()->toRoute('cadastros',[
            'controller' => 'corretor',
            'action'     => 'index'
        ]);
    }    
}
