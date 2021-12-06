<?php

declare(strict_types=1);

namespace Cadastros\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Laminas\Db\Adapter\AdapterInterface;
use Cadastros\Model\Corretor;
use Cadastros\Model\Imovel;
use Cadastros\Model\ImovelTable;

class ImovelController extends AbstractActionController
{
    private ImovelTable $imovelTable;

    public function __construct(ImovelTable $imovelTable)
    {
        $this->imovelTable = $imovelTable;
    }

    public function indexAction()
    {
        $imoveis = $this->imovelTable->listar();
        return new ViewModel([
            'imoveis' => $imoveis
        ]);
    }

    public function editarAction()
    {
        $imovelId = (int) $this->params('matricula');
        $imovel = $this->imovelTable->buscar($imovelId);

        return new ViewModel([
            'imovel' => $imovel
        ]);
    }

    public function gravarAction()
    {
        $imovel = new Imovel($_POST);
        $this->imovelTable->gravar($imovel);

        return $this->redirect()->toRoute('cadastros', [
            'controller' => 'imovel',
            'action'     => 'index'
        ]);
    }

    public function apagarAction()
    {
        $imovelId = (int) $this->params('matricula');
        $this->imovelTable->apagar($imovelId);
        return $this->redirect()->toRoute('cadastros', [
            'controller' => 'imovel',
            'action'     => 'index'
        ]);
    }
}