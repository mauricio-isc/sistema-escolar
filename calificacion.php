<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Calificaciones</title>
</head>
<link rel="stylesheet" type="text/css" href="css/subircalifica.css">
<body>
    <h1>Ingreso de calificaciones</h1>

    <form action="Conexion/guardar_calificaciones.php" method="POST">
        <label for="alumno">Alumno:</label>
        <select name="alumno" id="alumno">
            <?php
            // Aquí debes realizar la conexión a la base de datos y cargar las opciones de alumnos desde la tabla correspondiente
            $servername = "localhost";
            $username = "root";
            $password = "mauu";
            $dbname = "escuela";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener los alumnos desde la base de datos y generar las opciones
            $sql = "SELECT ID_Alumno, NombreUsuario FROM alumnos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID_Alumno'] . "'>" . $row['NombreUsuario'] . "</option>";
                }
            }

            $conn->close();
            ?>
        </select>

        <label for="carrera">Carrera:</label>
        <select name="carrera" id="carrera">
            <?php
            // Aquí debes realizar la conexión a la base de datos y cargar las opciones de carreras desde la tabla correspondiente
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener las carreras desde la base de datos y generar las opciones
            $sql = "SELECT ID_Carrera, Nombre FROM CARRERAS";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID_Carrera'] . "'>" . $row['Nombre'] . "</option>";
                }
            }

            $conn->close();
            ?>
        </select>

        <label for="materia">Materia:</label>
        <select name="materia" id="materia">
            <?php
            // Aquí debes realizar la conexión a la base de datos y cargar las opciones de materias desde la tabla correspondiente
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Error de conexión: " . $conn->connect_error);
            }

            // Obtener las materias desde la base de datos y generar las opciones
            $sql = "SELECT ID_Materia, Nombre FROM MATERIAS";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID_Materia'] . "'>" . $row['Nombre'] . "</option>";
                }
            }

            $conn->close();
            ?>
        </select>

        <label for="parcial1">Primer parcial:</label>
        <input type="number" name="parcial1" id="parcial1">

        <label for="parcial2">Segundo parcial:</label>
        <input type="number" name="parcial2" id="parcial2">

        <label for="parcial3">Tercer parcial:</label>
        <input type="number" name="parcial3" id="parcial3">

        <button type="submit">Guardar</button>
    </form>
    <script>
</script>

</body>
</html>
