<?php
include __DIR__.'\..\repository\LembreteRepository.php';

class LembreteModel {

    private $repository;
    public $nome;
    public $data;
    public $lembretes;

    public function __construct()
    {
        $this->repository = new LembreteRepository();
    }
    
    public function inserir(){
          $this->repository->inserir($this);      
    }

    public function obterTodos(){
        $this->lembretes =$this->repository->obterTodos();
    }

    public function deletar($id){
        $this->repository->deletar($id);      
  }
}
