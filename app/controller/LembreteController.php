<?php 

 include __DIR__.'\..\model\LembreteModel.php';

 class LembreteController 
{

    public static function index(){
        $model = new LembreteModel();
        $model->obterTodos();
        
        include 'app/view/home.php';
    }

    public static function salvar()
    {
        $lembrete = new LembreteModel();
        $lembrete->nome = $_POST['nome'];
        $lembrete->data = $_POST['data'];

        if ($lembrete->nome == '' || $lembrete->data == '') {
            $lembrete->error = "Necessário preencher todos os campos";
        }else {
            $lembrete->inserir();
        }
        include 'app/view/home.php';
        header('Location: /');
    }

    public static function excluir()
    {
        $lembrete = new LembreteModel();
        $id = $_POST['id'];

        $lembrete->deletar($id);

        header('Location: /');
    }
}