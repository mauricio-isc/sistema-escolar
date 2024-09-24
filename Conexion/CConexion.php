<?php
class Cconexion {
    public static function ConexionBD() {
        $host = 'localhost';
        $dbname = 'escuela';
        $username = 'root';
        $password = 'mauu'; 
        try {
            $conn = new PDO("mysql:host=$host; port=3306;dbname=$dbname", $username, $password);
         //   echo "Se conecto a la base de datos";
        } catch(PDOException $pe) {
            die ("Error de conexión: " . $pe->getMessage());
        }
     return $conn;
    }
    public static function CerrarConexion(){
   $conex=CConexion::ConexionBD().close();
   return $conex;
    }
}
?>