<?php

declare(strict_types=1);

namespace CadastrosTest\Controller;

use Cadastros\Controller\CorretorController;
use Laminas\Stdlib\ArrayUtils;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp(): void
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed(): void
    {
        $this->dispatch('/cadastros/corretor', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('cadastros');
        $this->assertControllerName('corretor'); // as specified in router's controller name alias
        $this->assertControllerClass('CorretorController');
        $this->assertMatchedRouteName('cadastros');
    }
    
    public function testApagarActionCanBeAccessed(): void
    {
        $this->dispatch('/cadastros/corretor/apagar', 'GET');
        $this->assertResponseStatusCode(302);
        $this->assertModuleName('cadastros');
        $this->assertControllerName('corretor'); // as specified in router's controller name alias
        $this->assertControllerClass('CorretorController');
        $this->assertMatchedRouteName('cadastros');
    }
    
    public function testEditarActionCanBeAccessed(): void
    {
        $this->dispatch('/cadastros/corretor/editar', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('cadastros');
        $this->assertControllerName('corretor'); // as specified in router's controller name alias
        $this->assertControllerClass('CorretorController');
        $this->assertMatchedRouteName('cadastros');
    }
    
    public function testGravarActionCanBeAccessed(): void
    {
        $_POST = [
            'nome' => 'Teste'
        ];
        $this->dispatch('/cadastros/corretor/gravar', 'POST');
        $this->assertResponseStatusCode(302);
        $this->assertModuleName('cadastros');
        $this->assertControllerName('corretor'); // as specified in router's controller name alias
        $this->assertControllerClass('CorretorController');
        $this->assertMatchedRouteName('cadastros');
        $corretorTable = $this->getApplication()->getServiceManager()->get('CorretorTable');
        $corretor = $corretorTable->buscarPorNome('Teste');
        $this->assertEquals('Teste', $corretor->nome);
        $corretorTable->apagarPorNome('Teste');
    }
    
}
