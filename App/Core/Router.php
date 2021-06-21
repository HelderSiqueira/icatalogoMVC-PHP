<?php

namespace App\Core;

class Router{

    private $controller;

    private $method = "index";

    private $params;

    function __construct(){
        //recuperar a url que esta sendo acessada
        $url =  $this->parseURL();
        //se o controller existir dentro da pasta controller
        if(isset($url[1]) && file_exists("../App/Controller/" . $url[1] . ".php")){
            $this->controller = $url[1];
            unset($url[1]);
        }elseif(empty($url[1])){
            //setamos o controller padrão da aplicação (produtos)
            $this->controller = "produtos";
        }else{
            //se não existir e houver um controller na url 
            //exibimos pagina não encontrada 
            $this->controller = "erro404";
        }

        //importamos o controller 
        require_once "../App/Controller/" . $this->controller . ".php";

        //instancia o controller 
        $this->controller = new $this->controller;

        if(isset($url[2])){
            if(method_exists($this->controller, $url[2])){
                $this->method = $url[2];
                unset($url[2]);
                unset($url[0]);
            }
        }
        //pegamos os parametros da url
        $this->params = $url ? array_values($url) : [];

        //executamos o método dentro do controller, passando os parametros 
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    //recuperar a url e retornar os parametros
    private function parseURL(){
        return explode("/", $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
    }

}