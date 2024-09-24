<?php
$host = 'localhost';
$dbname = 'escuela';
$username = 'root';
$password = 'mauu'; // Debes proporcionar aquí tu contraseña de la base de datos

try {
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// Habilitamos excepciones para manejar errores de la base de datos
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $pe) {
    die("Error de conexión: " . $pe->getMessage());
    }
    $sqlTotalAlumnos = "SELECT COUNT(*) AS TotalAlumnos FROM ALUMNO";
    $resultTotalAlumnos = $conn->query($sqlTotalAlumnos);
    $rowTotalAlumnos = $resultTotalAlumnos->fetch(PDO::FETCH_ASSOC);
    $totalAlumnos = $rowTotalAlumnos['TotalAlumnos'];

    $sqlTotalCarreras = "SELECT COUNT(*) AS TotalCarreras FROM CARRERAS";
    $resultTotalCarreras = $conn->query($sqlTotalCarreras);
    $rowTotalCarreras = $resultTotalCarreras->fetch(PDO::FETCH_ASSOC);
    $totalCarreras = $rowTotalCarreras['TotalCarreras'];
$conn = null;
?>
