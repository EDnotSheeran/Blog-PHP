<?php

class Core{
    
    public function start($urlget){
        $acao = 'index';

        if(isset($urlget['pagina'])){
            $controller = ucfirst($urlget['pagina'].'Controller');
        }else {
            $controller = 'HomeController';
        }

        if(!class_exists($controller)){
            $controller = 'ErrorController';
        }

        if(isset($urlget['id']) && $urlget['id'] != null){
            $id = $urlget['id'];
        }else{
            $id = null;
        }

        call_user_func_array(array($controller,$acao), array('id'=>$id));
    }
}