<?php
namespace App;
use MF\Init\Bootstrap;
use App\Connection;

class Route extends Bootstrap{

    protected function initRoutes(){
        $routes['criar_conta']=array(
            'route' => '/criar_conta',
            'controller' => 'AuthController',
            'action' => 'criar_conta'
        );
        $routes['login ']=array(
            'route' => '/login',
            'controller' => 'AuthController',
            'action' => 'login'
        );
        $this->setRoutes($routes);
    }

}
?>