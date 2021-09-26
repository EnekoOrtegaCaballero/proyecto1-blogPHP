<?php


// iniciar la sesión y la conexión

require_once 'includes/connection.php';

// Recoger datos del formulario

if (isset($_POST)) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";

    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $user = mysqli_fetch_assoc($login);
        // Comprobar la contraseña
        $verify = password_verify($password, $user['password']);

        if ($verify) {
            //utilizar una sesión para guardar los datos del usuario logueado.
            $_SESSION['user'] = $user;

            if (isset($_SESSION['error_login'])) {
                unset($_SESSION['error_login']);
            }
        } else {
            // Si algo falla enviar una sesión con el fallo
            $_SESSION['error_login'] = "Login incorrecto!!";
        }
    } else {
        // mensaje de error
        $_SESSION['error_login'] = "Login incorrecto!!";
    }
    header('Location: index.php');

}
?>