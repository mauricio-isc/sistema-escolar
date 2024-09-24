<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión alumno</title>
     <!-- Etiqueta awesome --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Etiqueta icon --> 
    <link rel="icon" type="image/png" href="C:\Users\mauri\Downloads\escuela.PNG">
    <!-- Estilos CSS -->    
<link rel="stylesheet" type="text/css" href="css/logeo.css">
</head>
<body>
    <div class="container">
        <h1>Inicio de sesión</h1>
        <!--importar la conexion-->
        <form action="Conexion/loginAlumno.php" method="post">
            <label for="nombre_usuario"><i class="fas fa-user"></i> Nombre de usuario:</label>
            <input type="text" name="nombre_usuario" id="nombre_usuario" required  placeholder="Ingrese su nombre de usuario">

             <!--importar el icono con el awesome en este caso uno de un candadito-->
            <label for="contrasena"><i class="fas fa-lock"> Contraseña:</i></label>
            <input type="password" name="Contraseña" id="contrasena" required placeholder="Ingrese su contraseña">


            <input type="submit" value="Iniciar sesión">
        </form>
        <p>¿Aun no formas parte de la institución? <a href="p.php">Informacion aquí</a></p>
    </div>
</body>
</html>