<?php

class AdminController{
    public function index(){
        try{
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('admin.html');
            
            $parametros = array();
            try{
                $objPostagens = PostagemModel::selecionaTodos();
            }catch(Exception $e){
                $objPostagens = array();
            }
            
            $parametros['postagens'] = $objPostagens; 

            $conteudo = $template->render($parametros);
            echo $conteudo;

        
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function create(){
        try{
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('create.html');

            $parametros = array();

            $conteudo = $template->render($parametros);
            echo $conteudo;

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function insert(){
        try{
            PostagemModel::insert($_POST);
            
            echo '<script>alert("Publicacao inserida com sucesso")</script>';
            echo '<script>location.href="?pagina=home"</script>';

        }catch(Exception $e){
            echo '<script>alert("'.$e->getMessage().'")</script>';
            echo '<script>location.href="?pagina=admin&metodo=create"</script>';

        }

    }
    public function change($paramId){
        try{
            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('update.html');

            $post = PostagemModel::selecionaPorId($paramId);

            $parametros = array();
            $parametros['id'] = $post->id;
            $parametros['titulo'] = $post->titulo;
            $parametros['conteudo'] = $post->conteudo;

            $conteudo = $template->render($parametros);
            echo $conteudo;

        }catch(Exception $e){

        }
    }
    public function update(){
        try{
            PostagemModel::update($_POST);

            echo '<script>alert("Publicacao alterada com sucesso")</script>';
            echo '<script>location.href="?pagina=home"</script>';
        }catch(Exception $e){
            echo '<script>alert("'.$e->getMessage().'")</script>';
            echo '<script>location.href="?pagina=admin&metodo=change&id='.$_POST['id'].'"</script>';
        }
    }
    public function delete(){
        try{
            PostagemModel::delete($_GET['id']);

            echo '<script>alert("Publicacao deletada com sucesso")</script>';
            echo '<script>location.href="?pagina=admin"</script>';
        }catch(Exception $e){
            echo '<script>alert("'.$e->getMessage().'")</script>';
            echo '<script>location.href="?pagina=admin"</script>';
        }
    }
}