<?php
namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action{
    
    public function index(){
        header("Access-Control-Allow-Origin: *"); // ou "http://localhost:5173"
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        header('Content-Type: application/json');
        $moodle = Container::getModel('Moodle');
        $retorno = $moodle->moodle();
        echo json_encode($retorno);
    }
    
}
?>