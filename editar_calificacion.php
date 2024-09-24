<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Calificación</title>
        <!-- Estilos CSS -->    
<link rel="stylesheet" type="text/css" href="css/editarca.css">
</head>
<body>
<div class="container">
        <h1>Editar Calificación</h1>

        <?php
        error_reporting(E_ALL);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $servername = "localhost";
            $username = "root";
            $password = "mauu";
            $dbname = "escuela";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener los datos de la calificación a editar
            $sql = "SELECT * FROM CALIFICACIONES WHERE ID_Calificacion = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                ?>

                <!-- Formulario de edición -->
                <form action="Conexion/actualizar_calificacion.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['ID_Calificacion']; ?>">

                    <label for="parcial1">Primer parcial:</label>
                    <input type="text" name="parcial1" id="parcial1" value="<?php echo $row['Primer_Parcial']; ?>">

                    <label for="parcial2">Segundo parcial:</label>
                    <input type="text" name="parcial2" id="parcial2" value="<?php echo $row['Segundo_Parcial']; ?>">

                    <label for="parcial3">Tercer parcial:</label>
                    <input type="text" name="parcial3" id="parcial3" value="<?php echo $row['Tercer_Parcial']; ?>">

                    <button type="submit">Guardar</button>
                </form>

                <?php
            } else {
                echo "<p>No se encontró la calificación.</p>";
            }

            $conn->close();
        } else {
            echo "<p>No se recibió el ID de la calificación a editar.</p>";
        }
        ?>
    </div>
</body>
</html>