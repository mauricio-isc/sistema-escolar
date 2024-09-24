<?php
$host = 'localhost';
$dbname = 'escuela';
$username = 'root';
$password = 'mauu'; // Debes proporcionar aquí tu contraseña de la base de datos

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Habilitamos excepciones para manejar errores de la base de datos
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $pe) {
    die("Error de conexión: " . $pe->getMessage());
}

// Consulta para obtener el total de alumnos
$sqlTotalAlumnos = "SELECT COUNT(*) AS AlumnosAprobados
                                        FROM CALIFICACIONES
                                             WHERE total >= 7.0;";
                $resultTotalAlumnos = $conn->query($sqlTotalAlumnos);
                $rowTotalAlumnos = $resultTotalAlumnos->fetch(PDO::FETCH_ASSOC);
                $totalAlumnos = $rowTotalAlumnos['AlumnosAprobados'];

// Consulta para obtener el total de carreras
$sqlTotalCarreras = "SELECT COUNT(*) AS AlumnosReprobados
                                     FROM CALIFICACIONES
                                        WHERE total < 7.0;";
                $resultTotalCarreras = $conn->query($sqlTotalCarreras);
                $rowTotalCarreras = $resultTotalCarreras->fetch(PDO::FETCH_ASSOC);
                $totalCarreras = $rowTotalCarreras['AlumnosReprobados'];

// Cerrar la conexión a la base de datos
$conn = null;
?>
