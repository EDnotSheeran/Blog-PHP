<?php

class ComentarioModel   {

    public static function selecionaComentarios($idPost){
        $conn = Connection::getConn();
        $sql = "SELECT * FROM comentario WHERE id_postagem = '{$idPost}';";
        $sql = $conn->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('ComentarioModel')) {
            $resultado[] = $row;
        }
        return $resultado;
    }
}