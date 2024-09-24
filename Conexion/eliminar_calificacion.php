<?php
// Verificar si se recibió el ID de la calificación a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Aquí debes realizar la conexión a la base de datos

    $servername = "localhost";
    $username = "root";
    $password = "mauu";
    $dbname = "escuela";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Eliminar la calificación de la tabla CALIFICACIONES
    $sql = "DELETE FROM CALIFICACIONES WHERE ID_Calificacion = '$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../calificaciones.php");
        exit();
    } else {
        echo "Error al eliminar la calificación: " . $conn->error;
    }

    $conn->close();
} else {
    echo "No se recibió el ID de la calificación a eliminar.";
}
?>
