<?php
session_start();

if (!isset($_SESSION["ID_Alumno"])) {
    header("Location: loginAlumno.php");
    exit();
}

$idAlumno = $_SESSION["ID_Alumno"];

$servername = "localhost";
$username = "root";
$password = "mauu";
$dbname = "escuela";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$sql = "SELECT * FROM CALIFICACIONES WHERE ID_Alumno = '$idAlumno'";
$resultado = $conn->query($sql);
?>