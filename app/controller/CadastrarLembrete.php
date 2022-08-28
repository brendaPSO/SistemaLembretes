<?php 

include("../model/Lembrete.php");
include("../model/Data.php");


if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $inputNome = $_POST['nome'];
    $inputData = $_POST['data'];

    $lembrete = new Lembrete();
    $lembrete->setNome($inputNome);

    $data = new Data();
    $data->setData($inputData);

    header('Location: ../../index.php');
}

?>