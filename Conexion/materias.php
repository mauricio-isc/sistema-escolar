<?php
include_once "CConexion.php";

class CCmateria{

   public static function mostrarTotalDeMaterias(){
      $query=CConexion::ConexionBD()->prepare("SELECT M.*, C.Nombre AS Nombre_Carrera
      FROM MATERIAS AS M
      JOIN CARRERAS AS C ON M.ID_Carrera = C.ID_Carrera");
      $query->execute();
      $data = $query->fetchAll();
      return $data;
   }   
   
   public static function InsertarNuevaMateria(){
      $nombres = $_POST['paramNombre'];
      $Carrera = $_POST['paramCarrera'];

      // Obtener el ID_Carrera por nombre utilizando una función auxiliar obtenerIDCarreraPorNombre
      $idCarrera = CCmateria::obtenerIDCarreraPorNombre($Carrera);

      $query=CConexion::ConexionBD()->prepare("INSERT INTO MATERIAS (Nombre, ID_Carrera) VALUES (?, ?)");
      
      $query->bindParam(1, $nombres, PDO::PARAM_STR);
      $query->bindParam(2, $idCarrera, PDO::PARAM_INT);

      if ($query->execute()) {
         header("Location: ../materias.php");
         exit();
      } else {
         // Manejo del error
         header("Location: ../materias.php");
         exit();
      }
   }

   public static function ModificarMateria(){
      $id = $_POST['paramID'];
      $Carrera = $_POST['paramNombre'];

      $query=CConexion::ConexionBD()->prepare("UPDATE MATERIAS SET Nombre = ? WHERE ID_Materia = ?");
      
      $query->bindParam(1, $Carrera, PDO::PARAM_STR);
      $query->bindParam(2, $id, PDO::PARAM_INT);

      if ($query->execute()) {
         header("Location: ../materias.php");
         exit();
      } else {
         // Manejo del error
         header("Location: ../materias.php");
         exit();
      }
   }

   public static function EliminarMateria(){
      $codigo = $_POST['paramID'];

      $query = CConexion::ConexionBD()->prepare("DELETE FROM MATERIAS WHERE ID_Materia = ?");
      $query->bindParam(1, $codigo, PDO::PARAM_INT);

      if ($query->execute()) {
         header("Location: ../materias.php");
         exit();
      } else {
         // Manejo del error
         header("Location: ../materias.php");
         exit();
      }
   }

   // Función auxiliar para obtener el ID_Carrera por nombre
   public static function obtenerIDCarreraPorNombre($nombreCarrera) {
      $query = CConexion::ConexionBD()->prepare("SELECT ID_Carrera FROM CARRERAS WHERE Nombre = ?");
      $query->bindParam(1, $nombreCarrera, PDO::PARAM_STR);
      $query->execute();
      $idCarrera = $query->fetchColumn();
      return $idCarrera;
   }

}

if (array_key_exists('insertar', $_POST)) {
   CCmateria::InsertarNuevaMateria();
}

if (array_key_exists('modificar', $_POST)) {
   CCmateria::ModificarMateria();
}

if (array_key_exists('eliminar', $_POST)) {
   CCmateria::EliminarMateria();
}
?>
