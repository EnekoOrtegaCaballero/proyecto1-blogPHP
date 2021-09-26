<?php

if (isset($_POST)) {
    require_once 'includes/connection.php';

    $name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;

    $errors = array();

    if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
        $nameOk = true;
    }else{
        $nameOk = false;
        $errors['name'] = "El nombre no es valido";
    }

    if(count($errors) == 0){
        $sql = "INSERT INTO categorias VALUES (NULL, '$name');";
        $save = mysqli_query($db, $sql);

    }
}

header ("Location: index.php");


?>









