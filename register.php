<?php

require_once 'includes/connection.php';

if(!isset($_SESSION)){
    session_start();
}

if (isset($_POST)) {
    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    $surname = isset($_POST['surname']) ? mysqli_real_escape_string($db, $_POST['surname']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;


    $errors = array();

    if (!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)) {
        $nameok = true;
    } else {
        $nameok = false;
        $errors['name'] = "El name no es valido";
    }


    if (!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)) {
        $surnameok = true;
    } else {
        $surnameok = false;
        $errors['surname'] = "El surname no es valido";
    }

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailok = true;
    } else {
        $emailok = false;
        $errors['email'] = "El email no es valido";
    }

    if (!empty($password)) {
        $passwordok = true;
    } else {
        $passwordok = false;
        $errors['password'] = "El password esta vacio";
    }

    $saveUser = false;

    if (count($errors) == 0) {
        $saveUser = true;

        // Cifrar la contraseña

        $passwordSafe = password_hash($password, PASSWORD_BCRYPT, ['cost'=> 5]);

        // Insertar usuario

        $sql = "INSERT INTO usuarios VALUES(null, '$name', '$surname', '$email', '$passwordSafe', CURDATE());";

        $save = mysqli_query($db, $sql);

        if ($save) {
            $_SESSION['savedOnDb'] = "El registro se ha completado";
        } else {
            $_SESSION['errors']['general'] = "fallo al guardar el usuario"  ;
        }
    } else {
        $_SESSION['errors'] = $errors;
    }
}

header('location: index.php');

?>