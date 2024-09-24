<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALUMNOS</title>
      <!-- Estilos CSS -->    
      <link rel="stylesheet" type="text/css" href="css/cargaralumno.css">
</head>
<body>
    <div class="container">
        <h1>INGRESA EL NUEVO ALUMNO</h1>
        <form id="alumnoForm" action="Conexion/Alumnos.php" method="POST">
            <label for="paramID">Id Alumno:</label>
            <input type="text" name="paramID" id="paramID" readonly="readonly">
            
            <label for="paramNombre">Nombre:</label>
            <input type="text" name="paramNombre" id="paramNombre">
            
            <label for="paramApellidoPaterno">Apellido paterno:</label>
            <input type="text" name="paramApellidoPaterno" id="paramApellidoPaterno">

            <label for="paramApellidoMaterno">Apellido materno:</label>
            <input type="text" name="paramApellidoMaterno" id="paramApellidoMaterno">

            <label for="paramCurp">CURP:</label>
            <input type="text" name="paramCurp" id="paramCurp">

            <label for="paramFechaNacimiento">Fecha de nacimiento:</label>
            <input type="text" name="paramFechaNacimiento" id="paramFechaNacimiento">

            <input type="submit" name="insertar" value="Guardar">
            <input type="submit" name="modificar" value="Modificar">
            <input type="submit" name="eliminar" value="Eliminar">
        </form>

        <h2>Lista de Alumnos</h2>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>CURP</th>
                    <th>Fecha de nacimiento</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once ('./Conexion/Alumnos.php');
                $consulta = CCarrera::mostrarTotalDeCarrerras();
                foreach ($consulta as $fila) {
                    echo "<tr>";
                    echo "<td>".$fila['ID_Alumno']."</td>";
                    echo "<td>".$fila['Nombre']."</td>";
                    echo "<td>".$fila['Apellido_Materno']."</td>";
                    echo "<td>".$fila['Apellido_Paterno']."</td>";
                    echo "<td>".$fila['CURP']."</td>";
                    echo "<td>".$fila['Fecha_Nacimiento']."</td>";
                    echo "<td>";
                    echo "<input type=\"submit\" value=\"Seleccionar\" onclick=\"Seleccionar(".$fila['ID_Alumno'].")\">";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
<script>
    function Seleccionar() {
            var table = document.querySelector("table");
            var rows = table.querySelectorAll("tr");
            for (var i = 1; i < rows.length; i++) {
                rows[i].onclick = function() {
                    var cells = this.cells;
                    document.getElementById('paramID').value = cells[0].innerHTML;
                    document.getElementById('paramNombre').value = cells[1].innerHTML;
                    document.getElementById('paramApellidoPaterno').value = cells[2].innerHTML;
                    document.getElementById('paramApellidoMaterno').value = cells[3].innerHTML;
                    document.getElementById('paramCurp').value = cells[4].innerHTML;
                    document.getElementById('paramFechaNacimiento').value = cells[5].innerHTML;
                };
            }
        }
/*
        var form = document.getElementById("alumnoForm");
        var inputCurp = document.getElementById("paramCurp");
        var errorElement = document.createElement("span");
        errorElement.classList.add("error");

        form.addEventListener("submit", function(event) {
            event.preventDefault();
            var curp = inputCurp.value.trim();
            var error = false;
            var table = document.querySelector("table");
            var rows = table.querySelectorAll("tr");

            for (var i = 1; i < rows.length; i++) {
                var curpCell = rows[i].cells[4];
                if (curpCell.innerHTML === curp) {
                    error = true;
                    break;
                }
            }

            if (error) {
                if (!inputCurp.parentNode.contains(errorElement)) {
                    inputCurp.parentNode.appendChild(errorElement);
                }
                errorElement.textContent = "¡La CURP ya existe!";
                form.classList.add("error");
            } else {
                if (inputCurp.parentNode.contains(errorElement)) {
                    inputCurp.parentNode.removeChild(errorElement);
                }
                form.classList.remove("error");
                form.submit();
            }
        });*/
    </script>
</body>
</html>
