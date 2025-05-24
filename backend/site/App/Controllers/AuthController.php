<?php
namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action{
    public function criar_conta(){
        $dados = json_decode(file_get_contents("php://input"), true);
        $username = $dados['username'];
        $senha = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $usuario = Container::getModel('Usuarios');
        $usuario->__set('username', $username);
        $usuario->__set('senha', $senha);
        if($usuario->ja_existe()){
            http_response_code(400);
            echo json_encode(['status' => 'erro', 'mensagem' => 'username-already-in-use']);
            return;
        }
        $usuario->criar_conta();
        echo json_encode(['status' => 'sucesso']);
    }
    public function login(){      
        $dados = json_decode(file_get_contents("php://input"), true);
        $username = $dados['username'];
        $senha = $dados['senha'];
        $usuario = Container::getModel('Usuarios');
        $usuario->__set('username', $username);
        $usuario->__set('senha', $senha);
        $resultado = $usuario->login();
        if(!$resultado){
            http_response_code(400);
            echo json_encode(['status' => 'erro', 'mensagem' => 'invalid-credential']);
            return;
        }
        echo json_encode(['status' => 'sucesso', 'user' => $resultado]);
    }
}
?>