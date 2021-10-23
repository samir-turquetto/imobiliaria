<?php

declare(strict_types=1);

namespace Cadastros;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'cadastros' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/cadastros[/:controller[/:action]]',
                    'defaults' => [
                        'controller' => Controller\CorretorController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'aliases' => [
            'corretor' => Controller\CorretorController::class
        ],
        'factories' => [
            Controller\CorretorController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'cadastros/corretor/index'      => __DIR__ . '/../view/cadastros/corretor/index.phtml',
            'error/404'                     => __DIR__ . '/../view/error/404.phtml',
            'error/index'                   => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
