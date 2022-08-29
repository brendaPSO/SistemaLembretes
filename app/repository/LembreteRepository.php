<?php

class LembreteRepository
{
    private $arquivo;

    public function inserir(LembreteModel $model)
    {
        try {
            $this->arquivo = fopen("database/cadastros.txt", "a");

            fwrite($this->arquivo, $model->data);
            fwrite($this->arquivo, ", ");
            fwrite($this->arquivo, $model->nome);
            fwrite($this->arquivo, "\n");

            fclose($this->arquivo);
        } catch (Exception $err) {
            throw new Exception('Erro ao tentar inserir no arquivo.');
        }
    }

    public function obterTodos()
    {
        try {
            $registros = $this->lerArquivo();
            $datas = [];
            $lembrete = [];

            foreach ($registros as $registro) {
                $datas[] = $this->obterData($registro); //Seleciona todas as datas armazenadas
            }

            $datas = array_unique($datas); //Datas repetidas são excluídas

            foreach ($datas as  $data) {
                foreach ($registros as $registro) {

                    if ($data == $this->obterData($registro)) {
                        if (!array_key_exists($data, $lembrete))
                            $lembrete[$data] = []; // Se a data não existir, será criada

                        array_push($lembrete[$data], $this->obterAnotacao($registro)); // Agrupa os lembretes com a mesma data
                    }
                }
            }

            ksort($lembrete); // Ordena as datas em ordem cronológica

            return  $lembrete;
        } catch (Exception $err) {
            throw new Exception("Houve um erro ao tentar ler do arquivo.");
        }
    }

    public function deletar($id)
    {
        try {

            $id = trim(strtoupper($id));
            $registros = $this->lerArquivo();

            foreach ($registros as $key => $registro) {
                $data = trim(strtoupper($this->obterAnotacao($registro)));
                if ($id == $data) {
                    unset($registros[$key]); //exclui o lembrete do array
                }
            }

            $registros = implode($registros); // transforma o array em string

            $this->arquivo = fopen("database/cadastros.txt", "w+");
            fwrite($this->arquivo, $registros); //reescreve o arquivo com o novo registro
            fclose($this->arquivo);
        } catch (Exception $err) {
            throw new Exception("Houve um erro ao tentar excluir o registro do arquivo.");
        }
    }


    private function lerArquivo()
    {
        $this->arquivo = fopen("database/cadastros.txt", "r");
        $registros = [];

        //ler do arquivo todos os dados
        while (!feof($this->arquivo)) {
            
            //Mostra uma linha do arquivo
            $aux = fgets($this->arquivo);
            if ($aux != '')
                $registros[] = $aux;
        }

        fclose($this->arquivo);
        return $registros;
    }

    private function obterData($registro)
    {
        return explode(',', $registro)[0];
    }

    private function obterAnotacao($registro)
    {
        return explode(',', $registro)[1];
    }
}
