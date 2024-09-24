<?php
session_start();

// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombreUsuario = isset($_POST["nombre_usuario"]) ? $_POST["nombre_usuario"] : "";
    $contrasena = isset($_POST["Contraseña"]) ? $_POST["Contraseña"] : "";
    // Realizar consulta a la base de datos para iniciar sesion
    $host = 'localhost';
    $dbname = 'escuela';
    $username = 'root';
    $password = 'mauu';
    try {
        $conn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $pe) {
        //Conexion de error
        die("Error de conexión: " . $pe->getMessage());
    }
    //Consulta para logearnos
    $sql = "SELECT ID_Alumno FROM alumnos WHERE NombreUsuario = :nombreUsuario AND Contraseña = :contrasena";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":nombreUsuario", $nombreUsuario, PDO::PARAM_STR);
    $stmt->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
    $stmt->execute();
    $alumno = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si se encontró un registro con las credenciales ingresadas, iniciar sesión
    //por ello condicionaremos
    if ($alumno) {
        $_SESSION["ID_Alumno"] = $alumno["ID_Alumno"];
        header("Location: ../calificacion_alumno.php"); // Redirigir al dashboard del alumno
        exit();
    } else {
        $mensajeError = "Credenciales incorrectas. Inténtalo nuevamente.";
        header("Location: ../logeoalu.php");
        $mensajeError = "Credenciales incorrectas. Inténtalo nuevamente.";
    }
}
?>