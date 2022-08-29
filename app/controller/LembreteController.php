<?php

include __DIR__ . '\..\model\LembreteModel.php';
include __DIR__ . '\..\..\core\Controller.php';

class LembreteController
{
    
    public static function index($params)
    {
        //Tenta redirecionar para a home com a lista de lembretes e parâmetros
        try {
            $model = new LembreteModel();
            $model->obterTodos();

           Controller::view('home', [$model, $params]);

        } catch (Exception $err) {
            //redireciona para a home com a mensagem de erro
            $params['erro']= $err->getMessage();
            Controller::view('home',[null,$params]);
        }
    }

    // Trata as informações para serem armazenadas em um novo lembrete
    public static function salvar()
    {
        try {
            $lembrete = new LembreteModel();

            $lembrete->nome = $_POST['nome'];
            $lembrete->data = $_POST['data'];

            if ($lembrete->nome == '' || $lembrete->data == '') {
                throw new Exception("Nome ou Data não está preenchido.");
            }

            if (strtotime($lembrete->data) < strtotime(date('Y/m/d'))) {
                throw new Exception("Data deve estar no futuro.");
            }

            if (strtotime($lembrete->data) > strtotime('01/01/2100')) {
                throw new Exception("Data máxima.");
            }

            $lembrete->inserir();

            Controller::redirect('/');
        } catch (Exception $err) {
            Controller::redirect('/', $err->getMessage());
        }
    }

    // Trata a identificação do lembrete que será deletado
    public static function excluir()
    {
        try {
            $lembrete = new LembreteModel();
            $id = $_POST['id'];

            $lembrete->deletar($id);

            Controller::redirect('/');
        } catch (Exception $err) {
            Controller::redirect('/', $err->getMessage());
        }
    }
}
