<?php

class SobreController{

    public function index(){
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('sobre.html');
            $conteudo = $template->render();
            echo $conteudo;
    }
}