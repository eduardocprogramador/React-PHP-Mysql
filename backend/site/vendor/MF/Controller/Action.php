<?php
namespace MF\Controller;

abstract class Action{
    protected $view;
    public function __construct(){
        $this->view = new \stdClass();
    }
    protected function content(){
        $classAtual = get_class($this);
        $classAtual = str_replace('App\\Controllers\\','',$classAtual);
        $classAtual = strtolower(str_replace('Controller','',$classAtual));
    }
}
?>