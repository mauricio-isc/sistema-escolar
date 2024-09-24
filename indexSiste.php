<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARRERAS</title>
        <!-- Estilos CSS -->    
<link rel="stylesheet" type="text/css" href="css/tablesiste.css">
</head>
<body>
    <header>
        <h1>Lista de Carreras</h1>
    </header>
    <div class="container">
        <form action="./Conexion/Carreras.php" method="POST">
            <h3>ID Carrera:</h3>
            <input type="text" name="paramID" id="paramID" readonly>
            <h3>Nombre:</h3>
            <input type="text" name="paramNombre" id="paramNombre">
            <h3>Duración:</h3>
            <input type="text" name="paramDuracion" id="paramDuracion">
            <h3>Descripción:</h3>
            <input type="text" name="paramDescripcion" id="paramDescripcion">
            <div id="botones">
                <button type="submit" name="insertar">Guardar</button>
                <button type="submit" name="modificar">Modificar</button>
                <button type="submit" name="eliminar">Eliminar</button>
            </div>
        </form>
        <div>
            <table id="mitabla">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Duración</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
                <?php
                include_once ('./Conexion/Carreras.php');
                $consulta = CCarrera::mostrarTotalDeCarrerras();

                foreach ($consulta as $fila) {
                    echo "<tr>";
                    echo "<td>".$fila['ID_Carrera']."</td>";
                    echo "<td>".$fila['Nombre']."</td>";
                    echo "<td>".$fila['Duracion']."</td>";
                    echo "<td>".$fila['Descripcion']."</td>";
                    echo "<td>";
                    echo "<button type=\"button\" onclick=\"Seleccionar(this)\">Seleccionar</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <div id="total">
                Total de Carreras: <?php echo count($consulta); ?>
            </div>
        </div>
    </div>
    <script>
        function Seleccionar(button) {
            var fila = button.parentElement.parentElement;
            var idCarrera = fila.cells[0].innerText;
            var nombre = fila.cells[1].innerText;
            var duracion = fila.cells[2].innerText;
            var descripcion = fila.cells[3].innerText;

            document.getElementById('paramID').value = idCarrera;
            document.getElementById('paramNombre').value = nombre;
            document.getElementById('paramDuracion').value = duracion;
            document.getElementById('paramDescripcion').value = descripcion;

            var filas = document.getElementsByTagName('tr');
            for (var i = 1; i < filas.length; i++) {
                filas[i].classList.remove("selected");
            }
            fila.classList.add("selected");
        }
    </script>
    
</body>
</html>
