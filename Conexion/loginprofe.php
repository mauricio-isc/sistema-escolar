<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $matricula = $_POST["matricula"];
    $contrasena = $_POST["contrasena"];

    // Realizar la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "mauu";
    $dbname = "Escuela";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }
    $contrasena_encriptada = md5($contrasena); // Encriptar la contraseña

    $sql = "SELECT * FROM MATRICULAS WHERE Matricula = '$matricula' AND ID_Maestro IS NOT NULL AND contrasena = '$contrasena_encriptada'";
    
    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso, redireccionar al menú principal
        header("Location: ../MenuMaestro.php");
        exit();
    } else {
        // Credenciales inválidas, mostrar mensaje de error
        header("Location: ../LoginMaestro.php");
        $error_message = "Matrícula o contraseña incorrectas";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>