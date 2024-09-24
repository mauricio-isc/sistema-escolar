<?php
include_once "CConexion.php";

class CCarrera{

   public static function mostrarTotalDeCarrerras(){
    $query=CConexion ::ConexionBD()->prepare("Select * from ALUMNO");
    $query->execute();
    $data = $query->fetchAll();
    return $data;
   }   
   
   public static function InsertarNuevaCarrera(){
      $nombres = $_POST['paramNombre'];
      $ApellidoPaterno= $_POST['paramApellidoPaterno'];
      $ApellidoMaterno = $_POST['paramApellidoMaterno'];
      $Curp = $_POST['paramCurp'];
      $FechaNacimiento = $_POST['paramFechaNacimiento'];
      $fechaFormateada = date('Y-m-d', strtotime($FechaNacimiento));
   
      $query = CConexion::ConexionBD()->prepare("INSERT INTO ALUMNO (Nombre, Apellido_Materno, Apellido_Paterno, CURP, Fecha_Nacimiento)
      VALUES (?, ?, ?, ?, ?);");
   
      $query->bindParam(1, $nombres, PDO::PARAM_STR);
      $query->bindParam(2, $ApellidoMaterno, PDO::PARAM_STR);
      $query->bindParam(3, $ApellidoPaterno, PDO::PARAM_STR);
      $query->bindParam(4, $Curp, PDO::PARAM_STR);
      $query->bindParam(5, $fechaFormateada, PDO::PARAM_STR);
   
      if ($query->execute()) {
       //  echo "ingreso correcto ";
         header("Location: ../alumnos.php");
         exit();
      } else {
        // echo "Ingreso incorrecto";
         header("Location: ../alumnos.php");
         exit();
      }
   }

   public static function ModificarCarrera(){
      $nombres = $_POST['paramNombre'];
      $ApellidoPaterno = $_POST['paramApellidoPaterno'];
      $ApellidoMaterno = $_POST['paramApellidoMaterno'];
      $Curp = $_POST['paramCurp'];
      $FechaNacimiento = $_POST['paramFechaNacimiento'];
  
      $fechaFormateada = date('Y-m-d', strtotime($FechaNacimiento));
  
      $query = CConexion::ConexionBD()->prepare("UPDATE ALUMNO
          SET Nombre = ?, Apellido_Materno = ?, Apellido_Paterno = ?, CURP = ?, Fecha_Nacimiento = ?
          WHERE ID_Alumno = ?;");
        
      $query->bindParam(1, $nombres, PDO::PARAM_STR);
      $query->bindParam(2, $ApellidoMaterno, PDO::PARAM_STR);
      $query->bindParam(3, $ApellidoPaterno, PDO::PARAM_STR);
      $query->bindParam(4, $Curp, PDO::PARAM_STR);
      $query->bindParam(5, $fechaFormateada, PDO::PARAM_STR);
      $query->bindParam(6, $ID_Alumno, PDO::PARAM_INT);
  
      // Aquí debes asignar el valor correcto a la variable $ID_Alumno
      $ID_Alumno = $_POST['paramID'];
  
      if ($query->execute()) {
          //echo "ingreso correcto ";
          header("Location: ../alumnos.php");
          exit();
      } else {
          //echo "Ingreso incorrecto";
          header("Location: ../alumnos.php");
          exit();
      }
  }

   public static function EliminarCarrera(){
      $codigo = $_POST['paramID'];
  
      $query = CConexion::ConexionBD()->prepare("DELETE FROM ALUMNO
          WHERE ID_Alumno = ?;");
      $query->bindParam(1, $codigo, PDO::PARAM_STR);
             
      if ($query->execute()) {
          //echo "ingreso correcto ";
          header("Location: ../alumnos.php");
          exit();
      } else {
          //echo "Ingreso incorrecto";
          header("Location: ../alumnos.php");
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