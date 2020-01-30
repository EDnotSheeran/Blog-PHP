<?php

abstract class Connection{
 
        private static $conn;

        public static function getConn(){
            try{
                if(self::$conn == null){
                    self::$conn = new PDO('mysql: host=localhost; dbname=Banco_Postagens;', 'root', '');
                }
                return self::$conn;
            }catch(Exception $e){
                throw new Exception('Falha ao conectar ao banco de dados');
            }
        }
}