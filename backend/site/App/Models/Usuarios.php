<?php

namespace App\Models;
use MF\Model\Model;

class Usuarios extends Model {
    private $id;
    private $username;
    private $senha;
    
    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo=$valor;
    }
    public function ja_existe() {
        $query = "SELECT COUNT(*) as total FROM usuarios WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $this->__get('username'));
        $stmt->execute();
        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $resultado['total'] > 0;
    }
    public function criar_conta(){
        $query='INSERT INTO usuarios(username,senha) VALUES(:username,:senha)';
        $stmt=$this->db->prepare($query);
        $stmt->bindValue(':username',$this->__get('username'));
        $stmt->bindValue(':senha',$this->__get('senha')); 
        $stmt->execute();
        return $this;
    }
    public function login(){
        $query = "SELECT id, username, senha FROM usuarios WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $this->__get('username'));
        $stmt->execute();
        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($usuario && password_verify($this->__get('senha'), $usuario['senha'])) {
            return [
                'uid' => $usuario['id'],
                'username' => $usuario['username']
            ];
        }
        return false;
    }
}

?>

