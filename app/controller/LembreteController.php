<?php 

class LembreteController extends Controller
{

    /**
     * Lista os contatos
     */
    // public function listar()
    // {
    //     $contatos = Lembrete::all();
    //     return $this->view('grade', ['contatos' => $contatos]);
    // }

    // /**
    //  * Mostrar formulario para criar um novo contato
    //  */
    // public function criar()
    // {
    //     return $this->view('form');
    // }

    // /**
    //  * Mostrar formulário para editar um contato
    //  */
    // public function editar($dados)
    // {
    //     $id      = (int) $dados['id'];
    //     $contato = Lembrete::find($id);

    //     return $this->view('form', ['contato' => $contato]);
    // }

    /**
     * Salvar o contato submetido pelo formulário
     */
    public function salvar()
    {
        try {
            $inputNome = $_POST['nome'];
            $inputData = $_POST['data'];
    
            $lembrete = new Lembrete();
            $lembrete->setNome($inputNome);
            $listLembrete[] = $lembrete->getNome();
    
            $data = new Data();
            $data->setData($inputData);
    
            // header('Location: ../../index.php');
            // return $this->view('index');
    
        } catch (\Throwable $th) {
            
        }
    }

    // /**
    //  * Atualizar o contato conforme dados submetidos
    //  */
    // public function atualizar($dados)
    // {
    //     $id                = (int) $dados['id'];
    //     $contato           = Contato::find($id);
    //     $contato->nome     = $this->request->nome;
    //     $contato->telefone = $this->request->telefone;
    //     $contato->email    = $this->request->email;
    //     $contato->save();

    //     return $this->listar();
    // }

    // /**
    //  * Apagar um contato conforme o id informado
    //  */
    // public function excluir($dados)
    // {
    //     $id      = (int) $dados['id'];
    //     $contato = Contato::destroy($id);
    //     return $this->listar();
    // }
}