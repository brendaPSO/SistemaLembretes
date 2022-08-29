<?php

class LembreteRepository
{
    private $arquivo;

    public function inserir(LembreteModel $model)
    {
        $this->arquivo = fopen("cadastros.txt", "a");
     
        fwrite($this->arquivo, $model->data);
        fwrite($this->arquivo, ", ");
        fwrite($this->arquivo, $model->nome);
        fwrite($this->arquivo, "\n");

        fclose($this->arquivo);
    }

    public function obterTodos()
    {
        $registros = $this->lerArquivo();
        $datas = [];
        $lembrete = [];

        foreach ($registros as $registro) {
            $datas[] = $this->obterData($registro);
        }

        $datas = array_unique($datas);

        foreach ($datas as  $data) {
            foreach ($registros as $registro) {

                if ($data ==$this->obterData($registro)) {
                    if (!array_key_exists($data, $lembrete)) 
                        $lembrete[$data] = [];

                        array_push($lembrete[$data], $this->obterAnotacao($registro));
                }
            }
        }

        return $lembrete;
    }

    public function deletar($id)
    {
        $id = trim(strtoupper($id));
        $registros = $this->lerArquivo();

        foreach ($registros as $key => $registro) {
            $data = trim(strtoupper($this->obterAnotacao($registro)));
            if($id == $data){
                unset($registros[$key]);
            }
        }

        $registros = implode( $registros);
        $this->arquivo = fopen("cadastros.txt", "w+");
        fwrite($this->arquivo, $registros);
        fclose($this->arquivo);
    }


    private function lerArquivo(){
        $this->arquivo = fopen("cadastros.txt", "r");
        $registros=[];
        //ler do arquivo todos os dados
        while (!feof($this->arquivo)) {
            //Mostra uma linha do arquivo
            $aux = fgets($this->arquivo);
            if($aux!='')
            $registros[]= $aux;
        }

        fclose($this->arquivo);
        return $registros;
    }
    
    private function obterData($registro){
        return explode(',', $registro)[0];
     }

     private function obterAnotacao($registro){
         return explode(',', $registro)[1];
      }
 
}
