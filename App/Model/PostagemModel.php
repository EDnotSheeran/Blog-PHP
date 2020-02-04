<?php

class PostagemModel {

    public static function selecionaTodos(){
        $conn = Connection::getConn();
        $sql = 'SELECT * FROM postagem ORDER BY id DESC;';
        $sql = $conn->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('PostagemModel')) {
            $resultado[] = $row;
        }

        if(!$resultado){
            throw new Exception("Nao Foi Encontrado Registro No Banco.");
        }

        return $resultado;
    }

    public static function selecionaPorId($idPost){
        $con = Connection::getConn();
        $sql = "SELECT * FROM postagem WHERE id = :idPost;";
        $sql = $con->prepare($sql);
        $sql->bindValue(':idPost',$idPost);
        $sql->execute();
        
        $resultado = $sql->fetchObject('PostagemModel');

        if(!$resultado){
            throw new Exception("Nao Foi Encontrado Registro No Banco.");
        }else{
            $resultado->comentarios = ComentarioModel::selecionaComentarios($resultado->id);
        }

        return $resultado;
    }
    public static function insert($dadospost){
        if(empty($dadospost['titulo']) OR empty($dadospost['conteudo'])){
            throw new Exception("Preencha todos os campos");
            return false;
        }
        $con = Connection::getConn();
        $sql = $con->prepare('INSERT INTO postagem (titulo,conteudo) VAlUES (:titulo, :conteudo);');
        $sql->bindValue(':titulo', $dadospost['titulo']);
        $sql->bindValue(':conteudo', $dadospost['conteudo']);
        $res = $sql->execute();
        //{$res} retorna true/false se conseguir inserir no banco
        if(!$res){
            throw new Exception('Falha ao inserir Publicacao.');
            return $res;
        }else{
            return $res;
        }

    }
    public static function update($dadospost){
        $con = Connection::getConn();
        $sql = "UPDATE postagem SET titulo = :titulo, conteudo = :conteudo WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':titulo',$dadospost['titulo']);
        $sql->bindValue(':conteudo',$dadospost['conteudo']);
        $sql->bindValue(':id',$dadospost['id']);
        $res = $sql->execute();

        if(!$res){
            throw new Exception("Falha ao alterar publicacao");
        }
    }
    public static function delete($idpost){
        $con = Connection::getConn();
        $sql = "DELETE FROM postagem WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id',$idpost);
        $res = $sql->execute();

        if (!$res) {
            throw new Exception("Falha ao deletar publicacao");
            return false;
        }
    }
}