<?php
require_once 'includes/connection.php'; 


if (isset($_SESSION['user']) && isset($_GET['id'])) {
    $postId = $_GET['id'];
    $usuarioId = $_SESSION['user']['id'];

    $sql = "DELETE FROM entradas WHERE usuario_id = $usuarioId AND id = $postId";
    
    $delete= mysqli_query($db, $sql);


}

header("Location: index.php");

?>
