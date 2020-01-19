<?

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
        $sql = "SELECT * FROM postagem WHERE id = '{$idPost}';";
        $sql = $con->prepare($sql);
        $sql->execute();
        
        $resultado = $sql->fetchObject('PostagemModel');

        if(!$resultado){
            throw new Exception("Nao Foi Encontrado Registro No Banco.");
        }else{
            $resultado->comentarios = ComentarioModel::selecionaComentarios($resultado->id);
        }

        return $resultado;
    }
}