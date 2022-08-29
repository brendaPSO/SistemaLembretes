<?php


class Controller {

    public static function redirect($route,$erro=null){
        $path = $route;
        
        if($erro !=null)
            $path=$route.'?erro='.$erro; //Adiciona na query parameters a descrição do erro

        header('Location: '.$path);
    }

    public static  function view($page, $parametros=null){ 
        [$model,$params]= $parametros; //Desestrutura para a página ter acesso ao model e parametros
        include_once __DIR__.'/../app/view/'.$page.'.php';
    }

}