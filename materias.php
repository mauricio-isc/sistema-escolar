<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MATERIAS</title>
        <!-- Estilos CSS -->    
<link rel="stylesheet" type="text/css" href="css/materias.css">
</head>
<body>
    <div class="container">
        <h1>Ingresa la nueva materias</h1>
        <form id="materiaForm" action="./Conexion/materias.php" method="POST">
            <label for="paramID">Id materia:</label>
            <input type="text" name="paramID" id="paramID" readonly="readonly">
            
            <label for="paramNombre">Nombre:</label>
            <input type="text" name="paramNombre" id="paramNombre">
            
            <label for="paramCarrera">Carrera:</label>
            <input type="text" name="paramCarrera" id="paramCarrera">

            <input type="submit" name="insertar" value="Guardar">
            <input type="submit" name="modificar" value="Modificar">
            <input type="submit" name="eliminar" value="Eliminar">
        </form>

        <h2>Lista de Materias</h2>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Nombre de la carrera</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once ('./Conexion/materias.php');
                $consulta = CCmateria::mostrarTotalDeMaterias();
                foreach ($consulta as $fila) {
                    echo "<tr>";
                    echo "<td>".$fila['ID_Materia']."</td>";
                    echo "<td>".$fila['Nombre']."</td>";
                    echo "<td>".$fila['Nombre_Carrera']."</td>";
                    echo "<td>";
                    echo "<input type=\"button\" value=\"Seleccionar\" onclick=\"Seleccionar('".$fila['ID_Materia']."', '".$fila['Nombre']."', '".$fila['Nombre_Carrera']."')\">";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function Seleccionar(id, nombre, carrera) {
            document.getElementById('paramID').value = id;
            document.getElementById('paramNombre').value = nombre;
            document.getElementById('paramCarrera').value = carrera;
        }
    </script>
</body>
</html>