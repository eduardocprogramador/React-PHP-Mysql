<?php

namespace App\Models;
use MF\Model\Model;

class Moodle extends Model {
    private $id;
    
    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo=$valor;
    }
    public function moodle(){
        $query='select id, fullname from pngc_course';
        $stmt=$this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>

