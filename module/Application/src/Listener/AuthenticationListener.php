<?php
namespace Application\Listener;

use Laminas\Mvc\MvcEvent;
use Laminas\Authentication\AuthenticationService;

class AuthenticationListener
{
    public function verificarAutenticacao(MvcEvent $event)
    {
        $router = $event->getRouter();
        $route = $router->match($event->getRequest());
        $routeName = $route->getMatchedRouteName();
        $action = $route->getParam('action');
        
        if ($routeName == 'home' || 
            ($routeName == 'application' && $action == 'index') ||
            ($routeName == 'application' && $action == 'login')){
            return;
        }
        
        $authenticationService = new AuthenticationService();
        if (!$authenticationService->hasIdentity()){
            $url = $router->assemble([],[
                'name' => 'home'                
            ]);
            header("Location: $url");
            exit;
        }
    }
}

