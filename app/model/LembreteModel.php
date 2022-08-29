<?php
include __DIR__.'\..\repository\LembreteRepository.php';

class LembreteModel {

    private $repository;
    public $nome;
    public $data;
    public $lembretes;
    public $error;

    public function __construct()
    {
        $this->repository = new LembreteRepository();
    }
    

    public function save(){
          $this->repository->insert($this);      
    }

    public function all(){
        $this->lembretes =$this->repository->all();
    }

    public function delete($id){
        $this->repository->delete_bd($id);      
  }
}

?>