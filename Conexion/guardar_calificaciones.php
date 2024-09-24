<?php
$host = 'localhost';
$dbname = 'escuela';
$username = 'root';
$password = 'mauu';

try {
    $conn = new PDO("mysql:host=$host; port=3306;dbname=$dbname", $username, $password);
    // echo "Se conecto a la base de datos";
    $conn->exec('SET FOREIGN_KEY_CHECKS=0;');
} catch(PDOException $pe) {
    die ("Error de conexión: " . $pe->getMessage());
}

// Obtener los datos del formulario
$alumno = $_POST['alumno'];
$materia = $_POST['materia'];
$parcial1 = $_POST['parcial1'];
$parcial2 = $_POST['parcial2'];
$parcial3 = $_POST['parcial3'];

// Calcular el total de las calificaciones
$total = ($parcial1 + $parcial2 + $parcial3) / 3;

// Insertar las calificaciones en la tabla CALIFICACIONES
$query = "INSERT INTO CALIFICACIONES (Primer_Parcial, Segundo_Parcial, Tercer_Parcial, total, ID_Alumno, ID_Materia)
          VALUES (:parcial1, :parcial2, :parcial3, :total, :alumno, :materia)";

$stmt = $conn->prepare($query);
$stmt->bindParam(':parcial1', $parcial1, PDO::PARAM_STR);
$stmt->bindParam(':parcial2', $parcial2, PDO::PARAM_STR);
$stmt->bindParam(':parcial3', $parcial3, PDO::PARAM_STR);
$stmt->bindParam(':total', $total, PDO::PARAM_STR);
$stmt->bindParam(':alumno', $alumno, PDO::PARAM_INT);
$stmt->bindParam(':materia', $materia, PDO::PARAM_INT);

if ($stmt->execute()) {
    // Redireccionar al archivo principal con un mensaje de éxito
    header("Location: ../Calificaciones.php");
    exit();
} else {
    // Redireccionar al archivo principal con un mensaje de error
    header("Location: index.php?success=false");
    exit();
}
?>
