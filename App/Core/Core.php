<?php

class Core{
    
    public function start($urlget){
//controller
        if(isset($urlget['pagina'])){
            $controller = ucfirst($urlget['pagina'].'Controller');
        }else {
            $controller = 'HomeController';
        }

        if(!class_exists($controller)){
            $controller = 'ErrorController';
        }
//metodo
        if(isset($urlget['metodo'])){
            $metodo = $urlget['metodo'];
        }else {
            $metodo = 'index';
        }
//parametros
        if(isset($urlget['id']) && $urlget['id'] != null){
            $id = $urlget['id'];
        }else{
            $id = null;
        }

        call_user_func_array(array($controller,$metodo), array('id'=>$id));
    }
}