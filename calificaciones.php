<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
        <!-- Estilos CSS -->    
    <link rel="stylesheet" type="text/css" href="css/stylecalifi.css">
    <!-- Exportar a EXCEL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
</head>
<body>
    <h1>Calificaciones</h1>

    <div class="search-container">
    <input type="text" id="search-alumno" placeholder="Buscar por nombre del alumno">
        <select id="search-materia">
            <option value="">Todas las materias</option>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "mauu";
            $dbname = "escuela";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM MATERIAS";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID_Materia'] . "'>" . $row['Nombre'] . "</option>";
                }
            }

            $conn->close();
            ?>
        </select>
        <button type="button" onclick="searchTable()">Buscar</button>
        <button id="btnImprimir" onclick="imprimir()">Imprimir</button>
        <button id="btnExportar" onclick="exportarExcel()">Exportar a excel</button>
        <button id="btnRegresar" onclick="Regresar()">Dar de alta calificacion</button>
        <button id="btnEstado" onclick="Estado()">Grafico A/R</button>
    </div>

    <table id="calificaciones-table">
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Materia</th>
                <th>Primer parcial</th>
                <th>Segundo parcial</th>
                <th>Tercer parcial</th>
                <th>Total</th>
                <th>Estado A/R</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "mauu";
            $dbname = "escuela";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener el valor del filtro de búsqueda
            $filtroAlumno = $_GET['alumno'] ?? '';
            $filtroMateria = $_GET['materia'] ?? '';

            // Construir la consulta SQL con los filtros de búsqueda
            $sql = "SELECT CALIFICACIONES.ID_Calificacion, ALUMNO.Nombre AS NombreAlumno, CALIFICACIONES.Primer_Parcial, CALIFICACIONES.Segundo_Parcial, CALIFICACIONES.Tercer_Parcial, CALIFICACIONES.total, MATERIAS.Nombre AS NombreMateria
            FROM CALIFICACIONES
            INNER JOIN ALUMNO ON CALIFICACIONES.ID_Alumno = ALUMNO.ID_Alumno
            INNER JOIN MATERIAS ON CALIFICACIONES.ID_Materia = MATERIAS.ID_Materia
            WHERE ALUMNO.Nombre LIKE '%$filtroAlumno%'";

            if (!empty($filtroMateria)) {
                // Utilizamos la función intval() para asegurarnos de que el valor sea un número entero
                $filtroMateria = intval($filtroMateria);
                $sql .= " AND CALIFICACIONES.ID_Materia = $filtroMateria";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['NombreAlumno'] . "</td>";
                    echo "<td>" . $row['NombreMateria'] . "</td>";
                    echo "<td>" . $row['Primer_Parcial'] . "</td>";
                    echo "<td>" . $row['Segundo_Parcial'] . "</td>";
                    echo "<td>" . $row['Tercer_Parcial'] . "</td>";
                    echo "<td>" . $row['total'] . "</td>";
                    $estado = ($row['total'] >= 7) ? 'Aprobado' : 'Reprobado';
                    echo "<td>" . $estado . "</td>";
                    echo "<td>";
                    echo "<a class='edit-button' href='editar_calificacion.php?id=" . $row['ID_Calificacion'] . "'>Editar</a>";
                    echo "<a class='delete-button' href='Conexion/eliminar_calificacion.php?id=" . $row['ID_Calificacion'] . "'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No se encontraron calificaciones</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <script>
        function searchTable() {
            var inputAlumno, selectMateria, table, tr, tdAlumno, tdMateria, i, txtValueAlumno, txtValueMateria;
            inputAlumno = document.getElementById("search-alumno");
            selectMateria = document.getElementById("search-materia");
            table = document.getElementById("calificaciones-table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                tdAlumno = tr[i].getElementsByTagName("td")[0];
                tdMateria = tr[i].getElementsByTagName("td")[1];
                if (tdAlumno && tdMateria) {
                    txtValueAlumno = tdAlumno.textContent || tdAlumno.innerText;
                    txtValueMateria = tdMateria.textContent || tdMateria.innerText;
                    if ((txtValueAlumno.toUpperCase().indexOf(inputAlumno.value.toUpperCase()) > -1) &&
                        (selectMateria.value === '' || selectMateria.value === txtValueMateria)) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function imprimir() {
            window.print();
        }

        function exportarExcel() {
        const tabla = document.getElementById("calificaciones-table");
        const nombreArchivo = "calificaciones.xlsx";
        const wb = XLSX.utils.table_to_book(tabla, { sheet: "Calificaciones" });

        // Agregar estilos condicionales
        const hoja = wb.Sheets["Calificaciones"];
        const calificacionesCeldas = Object.keys(hoja)
            .filter(cell => cell.startsWith("F") && hoja[cell].v !== undefined); // Filtrar solo las celdas con calificaciones

        calificacionesCeldas.forEach(cell => {
            const calificacion = hoja[cell].v;
            if (calificacion <= 7) {
                hoja[cell].s = {
                    fill: {
                        fgColor: { rgb: "FF0000" } // Rojo
                    },
                    font: {
                        color: { rgb: "FFFFFF" } // Blanco
                    }
                };
            }
        });

        // Crear un nuevo libro con las celdas modificadas
        const nuevoLibro = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(nuevoLibro, hoja, "Calificaciones");

        // Guardar el archivo Excel exportado con estilos condicionales
        XLSX.writeFile(nuevoLibro, nombreArchivo);
    }

        function Regresar(){
            window.location.href = 'calificacion.php';
        }
        function Estado(){
            window.location.href = 'graficoalumno.php';
        }
        window.onload = function () {
        searchTable();
    };
    </script>
</body>
</html>