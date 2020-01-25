<?php

class PostController{
    public function index($params){
        try{
            // var_dump($params);
            $Postagem = PostagemModel::selecionaPorId($params);
            // var_dump($Postagem);

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('post.html');

            $parametros = array();
            $parametros['titulo'] = $Postagem->titulo;
            $parametros['conteudo'] = $Postagem->conteudo;
            $parametros['comentarios'] = $Postagem->comentarios;
            $parametros['id'] = $Postagem->id;

            $conteudo = $template->render($parametros);
            echo $conteudo;

        
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function addComent(){
        try{
            ComentarioModel::addComentario($_POST);
            echo '<script>alert("mensagem enviada com sucesso!")</script>';
            echo '<script>location.href="?pagina=post&id='.$_POST['id'].'"</script>';
        }catch(Exception $e){
            echo '<script>alert("'.$e->getMessage().'")</script>';
            echo '<script>location.href="?pagina=post&id='.$_POST['id'].'"</script>';
        }
    }
}