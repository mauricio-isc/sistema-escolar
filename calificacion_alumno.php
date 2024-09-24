<?php
session_start();

if (!isset($_SESSION["ID_Alumno"]) || empty($_SESSION["ID_Alumno"])) {
    // Si el usuario no está autenticado, redirige al formulario de inicio de sesión
    header("Location: logeoalu.php");
    exit();
}

$host = 'localhost';
$dbname = 'escuela';
$username = 'root';
$password = 'mauu';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $pe) {
    die("Error de conexión: " . $pe->getMessage());
}

// Obtener el nombre del alumno actual
$sqlNombreAlumno = "SELECT Nombre FROM ALUMNO WHERE ID_Alumno = :idAlumno";
$stmtNombreAlumno = $conn->prepare($sqlNombreAlumno);
$stmtNombreAlumno->bindParam(":idAlumno", $_SESSION["ID_Alumno"], PDO::PARAM_INT);
$stmtNombreAlumno->execute();
$nombreAlumno = $stmtNombreAlumno->fetchColumn();

// Obtener las calificaciones del alumno actual junto con el nombre de la materia
$sqlCalificacionesAlumno = "
    SELECT c.Primer_Parcial, c.Segundo_Parcial, c.Tercer_Parcial, c.total, m.Nombre AS Nombre_Materia
    FROM CALIFICACIONES c
    INNER JOIN MATERIAS m ON c.ID_Materia = m.ID_Materia
    WHERE c.ID_Alumno = :idAlumno
";
$stmtCalificacionesAlumno = $conn->prepare($sqlCalificacionesAlumno);
$stmtCalificacionesAlumno->bindParam(":idAlumno", $_SESSION["ID_Alumno"], PDO::PARAM_INT);
$stmtCalificacionesAlumno->execute();
$calificacionesAlumno = $stmtCalificacionesAlumno->fetchAll(PDO::FETCH_ASSOC);
?>







<!--formulario-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard del Alumno</title>
    <link rel="stylesheet" type="text/css" href="css/dashboardalumn.css">
</head>
<button id="btnImprimir" onclick="imprimir()">Imprimir</button>
<body>
    <h1>Bienvenid@, <?php echo $nombreAlumno; ?></h1>
    <?php if (count($calificacionesAlumno) > 0) : ?>
        <h2>Calificaciones</h2>
        <table>
            <tr>
                <th>Materia</th>
                <th>Primer parcial</th>
                <th>Segundo parcial</th>
                <th>Tercer parcial</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>
            <?php foreach ($calificacionesAlumno as $calificacion) : ?>
                <tr>
                    <td><?php echo $calificacion["Nombre_Materia"]; ?></td>
                    <td><?php echo $calificacion["Primer_Parcial"]; ?></td>
                    <td><?php echo $calificacion["Segundo_Parcial"]; ?></td>
                    <td><?php echo $calificacion["Tercer_Parcial"]; ?></td>
                    <td><?php echo $calificacion["total"]; ?></td>
                    <td>
                        <?php
            $estado = ($calificacion['total'] >= 7) ? 'Aprobado' : 'Reprobado';
            echo $estado;
            ?>
        </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No se encontraron calificaciones para el alumno.</p>
    <?php endif; ?>

    <form action="logeoalu.php" method="post">
        <input type="submit" value="Cerrar sesión" id="logout">
    </form>
    <script>
            function imprimir() {
            window.print();
        }
    </script>
</body>
</html>
