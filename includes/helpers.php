<?php


function showError ($errors, $campo) {
    $alerta = '';

    if(isset($errors[$campo]) && !empty($campo)){
        $alerta = '<div class="alert alert-error">'.$errors[$campo].'</div>';
    }

    return $alerta;
}

function deleteErrors() {

    $delete=false;

    
    if(isset($_SESSION['errors_posts'])){
        $_SESSION['errors_posts'] = null;
    }

    if(isset($_SESSION['errors'])){
        $_SESSION['errors'] = null;
        unset($_SESSION['errors']);
    }
    if(isset($_SESSION['savedOnDb'])){
        $_SESSION['savedOnDb'] = null;
        unset($_SESSION['savedOnDb']);
    }

    return $delete;
}

function getCategories($db){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categoriesArray = mysqli_query($db, $sql);
    $result = array();

    if($categoriesArray && mysqli_num_rows($categoriesArray) >= 1){
        $result = $categoriesArray;
    }

    return $result;
}

function getCategory($db, $id){
    $sql = "SELECT * FROM categorias where id = $id;";
    $categoriesArray = mysqli_query($db, $sql);
    $result = array();

    if($categoriesArray && mysqli_num_rows($categoriesArray) >= 1){
        $result = mysqli_fetch_assoc($categoriesArray);
    }

    return $result;
}

function getPosts($db, $limit=4, $category= null, $search=null){
    $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ".
    "ORDER BY e.id DESC";
    if ($limit) {
        $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ".
        "ORDER BY e.id DESC LIMIT $limit;";
    
        if (!empty($category)) {
            $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ".
        "WHERE e.categoria_id = $category ORDER BY e.id DESC LIMIT $limit;";
        }
    }
    if(!empty($category)){
        $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ".
        "WHERE e.categoria_id = $category ORDER BY e.id DESC;";
    
    }

    if(!empty($search)){
        $sql = "SELECT e.*, c.nombre as 'categoria' FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ".
        "WHERE e.titulo LIKE '%$search%';";;
        
    }


    $posts = mysqli_query($db, $sql);

    $result = array();

    if($posts && mysqli_num_rows($posts) >= 1){
        $result = $posts;
    }

    return $result;
}

function getPost($db, $id){
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre,' ', u.apellidos) AS 'nombreusuario' ".
    "FROM entradas e INNER JOIN categorias c ON e.categoria_id = c.id ".
    "INNER JOIN usuarios u ON e.usuario_id = u.id WHERE e.id= $id";

    $post = mysqli_query($db, $sql);


    $result = array();

    if($post && mysqli_num_rows($post) >= 1){
        $result = mysqli_fetch_assoc($post);
    }

    return $result;


}


?>
