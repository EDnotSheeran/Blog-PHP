<?php

class ComentarioModel   {

    public static function selecionaComentarios($idPost){
        $conn = Connection::getConn();
        $sql = "SELECT * FROM comentario WHERE id_postagem = :idPost;";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':idPost',$idPost);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('ComentarioModel')) {
            $resultado[] = $row;
        }
        return $resultado;
    }
    public static function addComentario($dados){
        if(empty($dados['nome']) OR empty($dados['mensagem']) OR empty($dados['id'])){
            throw new Exception("Preencha todos os campos");
            return false;
        }

        $conn = Connection::getConn();
        $sql = "INSERT INTO comentario(nome,mensagem,id_postagem) VALUES(:nm ,:msg, :id);";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':nm',$dados['nome']);
        $sql->bindValue(':msg',$dados['mensagem']);
        $sql->bindValue(':id',$dados['id']);
        $res =  $sql->execute();

        if(!$res){
            throw new Exception("Falha ao inserir comentario");
            return false;
        }

    }
}