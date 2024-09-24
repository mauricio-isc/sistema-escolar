<?php
include_once "CConexion.php";

class CCarrera{

   public static function mostrarTotalDeCarrerras(){
    $query=CConexion ::ConexionBD()->prepare("Select * from CARRERAS");
    $query->execute();
    $data = $query->fetchAll();
    return $data;
   }   
   
   public static function InsertarNuevaCarrera(){

      $nombres = $_POST['paramNombre'];
      $Duracion= $_POST['paramDuracion'];
      $Descripcion = $_POST['paramDescripcion'];

      $query=CConexion ::ConexionBD()->prepare("INSERT INTO CARRERAS (Nombre, Duracion, Descripcion)
      VALUES (?, ?, ?);");
      
      $query->bindParam(1, $nombres, PDO::PARAM_STR);
      $query->bindParam(2, $Duracion, PDO::PARAM_STR);
      $query->bindParam(3, $Descripcion, PDO::PARAM_STR);
      if($query->execute()){
         //echo "ingreso correcto ";
         header("Location: ../indexSiste.php");
         exit();
      }else{
         //echo "Ingreso incorrecto";
         header("Location: ../indexSiste.php");
         exit();
      }
   }

   public static function ModificarCarrera(){
      $id = $_POST['paramID'];
      $nombres = $_POST['paramNombre'];
      $Duracion= $_POST['paramDuracion'];
      $Descripcion = $_POST['paramDescripcion'];
    

      $query=CConexion::ConexionBD()->prepare("UPDATE CARRERAS
      SET Nombre = ?, Duracion = ?, Descripcion = ?
      WHERE ID_Carrera = ?;");
      
      $query->bindParam(1, $nombres, PDO::PARAM_STR);
      $query->bindParam(2, $Duracion, PDO::PARAM_STR);
      $query->bindParam(3, $Descripcion, PDO::PARAM_STR);
      $query->bindParam(4, $id, PDO::PARAM_INT);
      
   
      if($query->execute()){
         //echo "ingreso correcto ";
         header("Location: ../indexSiste.php");
         exit();
      }else{
         //echo "Ingreso incorrecto";
         header("Location: ../indexSiste.php");
         exit();
      }
   }

   public static function EliminarCarrera(){

      $codigo= $_POST['paramID'];
   

      $query=CConexion ::ConexionBD()->prepare("DELETE FROM CARRERAS
      WHERE ID_Carrera = ?;");
      $query->bindParam(1, $codigo,PDO::PARAM_INT);
           
      if($query->execute()){
         //echo "ingreso correcto ";
         header("Location: ../indexSiste.php");
         exit();
      }else{
         //echo "Ingreso incorrecto";
         header("Location: ../indexSiste.php");
         exit();
      }
   }


}

if(array_key_exists('insertar',$_POST)){
   CCarrera::InsertarNuevaCarrera();
}

if(array_key_exists('modificar',$_POST)){
   CCarrera::ModificarCarrera();
}

if(array_key_exists('eliminar',$_POST)){
   CCarrera::EliminarCarrera();
}
?>