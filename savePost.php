<?php
if(isset($_POST)){
    require_once 'includes/connection.php';

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;

    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;

    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;

    $usuario = $_SESSION['user']['id'];

    //validacion

    $errors = array();

    if(empty($titulo)){
        $errors['titulo'] = 'El titulo no es valido';
    }

    if(empty($descripcion)){
        $errors['descripcion'] = 'La descripcion no es valido';
    }

    if(empty($categoria) && !is_numeric($categoria)){
        $errors['categoria'] = 'La categoria no es valida';
    }


    if(count($errors) == 0){
    
        if(isset($_GET['editar'])){
            $getId = $_GET['editar'];
            $userId = $_SESSION['user']['id'];
            $sql = "UPDATE entradas SET TITULO='$titulo', descripcion='$descripcion', categoria_id=$categoria ".
            " WHERE id=$getId AND usuario_id=$userId";
        }
        else{
            $sql = "INSERT INTO entradas VALUES (null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        }
        $save = mysqli_query($db, $sql);
        header("Location: index.php");
    }else{

        $_SESSION["errors_posts"] = $errors;
    if(isset($_GET['editar'])){
        header("Location: editPost.php?id=".$_GET['editar']);
    }else{
        header("Location: newPost.php");

    }
    }
}

