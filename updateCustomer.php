<?php
if(isset($_POST)){
	
	// Conexión a la base de datos
	require_once 'includes/connection.php';

	// Recorger los valores del formulario de actulizacion
	$name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
	$surname = isset($_POST['surname']) ? mysqli_real_escape_string($db, $_POST['surname']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;

	// Array de errores
	$errors = array();
	
	// Validar los datos antes de guardarlos en la base de datos
	// Validar campo nombre
	if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
		$nameOk = true;
	}else{
		$nameOk = false;
		$errors['name'] = "El nombre no es válido";
	}
	
	// Validar apellidos
	if(!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)){
		$surnameOk = true;
	}else{
		$surnameOk = false;
		$errors['surname'] = "Los apellidos no son válido";
	}
	
	// Validar el email
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$emailOk = true;
	}else{
		$emailOk = false;
		$errors['email'] = "El email no es válido";
	}
	
	$saveUser = false;
	
	if(count($errors) == 0){
		$user= $_SESSION['user'];
        $saveUser = true;
		

		// COMPROBAR SI EL EMAIL YA EXISTE
		$sql = "SELECT id, email FROM usuarios WHERE email = '$email';";
		$isset_email = mysqli_query($db, $sql);
		$isset_user = mysqli_fetch_assoc($isset_email);
  

		if($isset_user['id'] == $user['id'] || empty($isset_user)){
			// ACTULIZAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
			
			$sql = "UPDATE usuarios SET ".
				   "nombre = '$name', ".
				   "apellidos = '$surname', ".
				   "email = '$email' ".
				   "WHERE id = ".$user['id'];
			$save = mysqli_query($db, $sql);


			if($save){
				$_SESSION['user']['nombre'] = $name;
				$_SESSION['user']['apellidos'] = $surname;
				$_SESSION['user']['email'] = $email;

				$_SESSION['savedOnDb'] = "Tus datos se han actualizado con éxito";
			}else{
				$_SESSION['errors']['general'] = "Fallo al actualizar tus datos!!";
			}
		}else{
			$_SESSION['errors']['general'] = "El usuario ya existe!!";
		}
		
	}else{
		$_SESSION['errors'] = $errors;
	}
}

header('Location: customer.php');

?>