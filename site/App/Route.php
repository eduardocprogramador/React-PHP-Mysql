<?php
namespace App;
use MF\Init\Bootstrap;
use App\Connection;

class Route extends Bootstrap{

    protected function initRoutes(){
        $routes['home']=array(
            'route' => '/api/cursos',
            'controller' => 'indexController',
            'action' => 'index'
        );
        $this->setRoutes($routes);
    }

}
?>