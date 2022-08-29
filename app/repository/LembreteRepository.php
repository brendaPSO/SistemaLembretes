<?php

class LembreteRepository
{

    private $file;
    private $ler;
    private $escrever;

    public function __construct()
    {
        $this->file = fopen("cadastros.txt", "a");
    }

    public function insert(LembreteModel $model)
    {
        fwrite($this->file, $model->data);
        fwrite($this->file, ", ");
        fwrite($this->file, $model->nome);
        fwrite($this->file, "\n");
        fclose($this->file);
        return;
    }

    public function all()
    {
        $this->ler = fopen("cadastros.txt", "r");
        $lista = [];
        $datas = [];
        //ler do arquivo todos os dados
        while (!feof($this->ler)) {
            //Mostra uma linha do arquivo
            $aux = fgets($this->ler);
            if($aux!='')
            $lista[]= $aux;
        }

        fclose($this->ler);

        foreach ($lista as $key => $dado) {
            $datas[] = explode(',', $dado)[0];
        }
        $datas = array_unique($datas);
        $data2 = [];

        foreach ($datas as  $data) {

            foreach ($lista as $dado) {

                $info = explode(',', $dado);
                if ($data == $info[0]) {

                    if (!array_key_exists($data, $data2)) {

                        $data2[$data] = [];
                    }
         
                    array_push($data2[$data], $info[1]);
                }
            }
        }

        return $data2;
    }


    public function delete_bd($id)
    {
        $id = trim(strtoupper($id));
        $this->ler = fopen("cadastros.txt", "r");
        $lista = [];
        //ler do arquivo todos os dados
        while (!feof($this->ler)) {
            //Mostra uma linha do arquivo
            $aux = fgets($this->ler);
            if($aux!='')
            $lista[]= $aux;
        }

        fclose($this->ler);

        foreach ($lista as $key => $dado) {
            $data = trim(strtoupper(explode(',', $dado)[1]));
            if($id == $data){
                unset($lista[$key]);
            }
        }
        

        $string = implode("", $lista);
        $this->escrever = fopen("cadastros.txt", "w+");
        fwrite($this->file, $string);
        fclose($this->escrever);
    }
}
