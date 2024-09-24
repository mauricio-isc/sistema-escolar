<?php
include_once "CConexion.php";

class CAlumnos{

   public static function mostrarTotalDeAlumnos(){
    $query=CConexion ::ConexionBD()->prepare("Select * from usuario");
    $query->execute();
    $data = $query->fetchAll();
    return $data;
   }   
   
   public static function InsertarNuevoAlumno(){

      $dni = $_POST['paramDni'];
      $nombres = $_POST['paramNombres'];
      $apellidos= $_POST['paramApellidos'];
      $edad = $_POST['paramEdad'];

      $query=CConexion ::ConexionBD()->prepare("INSERT INTO CALIFICACIONES (Primer_Parcial, Segundo_Parcial, Tercer_Parcial, total, ID_Alumno)
      VALUES (?, ?, ?, ?, ?);
      ");
      $query->bindParam(1, $dni,PDO::PARAM_STR);
      $query->bindParam(2, $nombres,PDO::PARAM_STR);
      $query->bindParam(3, $apellidos,PDO::PARAM_STR);
      $query->bindParam(4, $edad,PDO::PARAM_INT);
           
      if($query->execute()){
         //echo "ingreso correcto ";
         header("Location: ../index.php");
         exit();
      }else{
         //echo "Ingreso incorrecto";
         header("Location: ../index.php");
         exit();
      }
   }

   public static function ModificarAlumno(){

      $codigo= $_POST['paramCodigo'];
      $dni = $_POST['paramDni'];
      $nombres = $_POST['paramNombres'];
      $apellidos= $_POST['paramApellidos'];
      $edad = $_POST['paramEdad'];

      $query=CConexion ::ConexionBD()->prepare("UPDATE usuario SET usuario.dni = ?,usuario.Nombre=?,usuario.Apellido=?,usuario.edad=? WHERE usuario.codigo=?;");
      $query->bindParam(1, $dni,PDO::PARAM_STR);
      $query->bindParam(2, $nombres,PDO::PARAM_STR);
      $query->bindParam(3, $apellidos,PDO::PARAM_STR);
      $query->bindParam(4, $edad,PDO::PARAM_INT);
      $query->bindParam(5, $codigo,PDO::PARAM_INT);
           
      if($query->execute()){
         //echo "ingreso correcto ";
         header("Location: ../index.php");
         exit();
      }else{
         //echo "Ingreso incorrecto";
         header("Location: ../index.php");
         exit();
      }
   }

   public static function EliminarAlumno(){

      $codigo= $_POST['paramCodigo'];
   

      $query=CConexion ::ConexionBD()->prepare("DELETE FROM usuario WHERE usuario.codigo=?;");
      $query->bindParam(1, $codigo,PDO::PARAM_INT);
           
      if($query->execute()){
         //echo "ingreso correcto ";
         header("Location: ../index.php");
         exit();
      }else{
         //echo "Ingreso incorrecto";
         header("Location: ../index.php");
         exit();
      }
   }


}

if(array_key_exists('insertar',$_POST)){
   CAlumnos::InsertarNuevoAlumno();
}

if(array_key_exists('modificar',$_POST)){
   CAlumnos::ModificarAlumno();
}

if(array_key_exists('eliminar',$_POST)){
   CAlumnos::EliminarAlumno();
}
?>