<?php

include('CConexion.php');

session_start();

if (isset($_POST['registro'])) {

    $username = $_POST['Coordinador'];

    $matricula = $_POST['matricula'];

    $contrasena = $_POST['Contrasena'];

    $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);

    $query = $connection->prepare("SELECT * FROM CONTRASENAS WHERE Contrasena = '$contrasena' AND ID_Matricula = '$matricula'");

    $query->bindParam("matricula", $matricula, PDO::PARAM_STR);

    $query->execute();

    if ($query->rowCount() > 0) {

        echo '<p class="error">The email address is already registered!</p>';

    }

    if ($query->rowCount() == 0) {

        $query = $connection->prepare("INSERT INTO Coordinador(ID_MATRICULA,CONTRASENA,EMAIL) VALUES (:Matricula,:Contrasena,:email)");

        $query->bindParam("username", $username, PDO::PARAM_STR);

        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);

        $query->bindParam("email", $email, PDO::PARAM_STR);

        $result = $query->execute();

        if ($result) {

            echo '<p class="success">Your registration was successful!</p>';

        } else {

            echo '<p class="error">Something went wrong!</p>';

        }

    }

}

?>
