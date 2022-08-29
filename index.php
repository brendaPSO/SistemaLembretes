<?php

include 'app/controller/LembreteController.php';

$url= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ;

switch($url){
    
        case'/':
         LembreteController::index();
        break;
        case'/lembrete/salvar':
            LembreteController::salvar();
        break;
        case'/lembrete/excluir':
            LembreteController::excluir();
        break;
}
?>
