

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ver Calificaciones</title>
            <!-- Estilos CSS -->    
<link rel="stylesheet" type="text/css" href="css/calificacionalu.css">
</head>
<body>
    <div class="container" action="Conexion/loginAlumno.php" method="post">
        <h2>Calificaciones del Alumno</h2>
        <table>
            <tr>
                <th>ID Calificación</th>
                <th>Primer Parcial</th>
                <th>Segundo Parcial</th>
                <th>Tercer Parcial</th>
                <th>Total</th>
            </tr>
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["ID_Calificacion"] . "</td>";
                    echo "<td>" . $fila["Primer_Parcial"] . "</td>";
                    echo "<td>" . $fila["Segundo_Parcial"] . "</td>";
                    echo "<td>" . $fila["Tercer_Parcial"] . "</td>";
                    echo "<td>" . $fila["total"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No se encontraron calificaciones.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>