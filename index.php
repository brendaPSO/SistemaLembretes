<?php

include 'app/controller/LembreteController.php';

$url_components = parse_url($_SERVER['REQUEST_URI']); // Seleciona o url completo
$url = $url_components['path']; 
$params=null;

if (array_key_exists('query', $url_components)) 
    parse_str($url_components['query'], $params);


switch($url){
    
        case'/':
        LembreteController::index($params);
        break;
        case'/lembrete/salvar':
            LembreteController::salvar();
        break;
        case'/lembrete/excluir':
            LembreteController::excluir();
        break;
}
?>
