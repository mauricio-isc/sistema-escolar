
<html>
<head>
    <title>Iniciar sesión Coordinador
    </title>
    <link rel="stylesheet" type="text/css" href="css/loginco.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar sesión
            Coordinador
        </h2>
        <form action="Conexion/loginco.php" method="post" >
            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" required placeholder="Ingrese su matricula"><br><br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required placeholder="Ingrese su contraseña"><br><br>
            <input type="submit" value="Iniciar sesión">
        </form>
        <?php if (isset($error_message)) { ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php } ?>
    </div>
</body>
</html>
