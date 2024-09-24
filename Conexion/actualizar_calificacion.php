<?php
// Verificar si se recibió el ID de la calificación a editar
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Aquí debes realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "mauu";
    $dbname = "escuela";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener los datos actualizados del formulario
    $parcial1 = $_POST['parcial1'];
    $parcial2 = $_POST['parcial2'];
    $parcial3 = $_POST['parcial3'];

    // Calcular la calificación total
    $total = ($parcial1 + $parcial2 + $parcial3) / 3;

    // Construir la consulta de actualización
    $sql = "UPDATE CALIFICACIONES SET Primer_Parcial = '$parcial1', Segundo_Parcial = '$parcial2', Tercer_Parcial = '$parcial3', total = '$total' WHERE ID_Calificacion = '$id'";

    if ($conn->query($sql) === TRUE) {
       // echo "Calificación actualizada correctamente.";
       header("Location: ../calificaciones.php");
    } else {
        echo "Error al actualizar la calificación: " . $conn->error;
    }

    $conn->close();
}
?>

