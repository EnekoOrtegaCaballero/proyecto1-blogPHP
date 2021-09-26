<?php require_once 'connection.php'; ?>
<?php require_once 'helpers.php'; ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Programación</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />

</head>
<body>
    <header id="header">
        <div id="logo">
            <a href="index.php">
                <h1>Blog de Programación</h1>
            </a>
        </div>

        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php $categoriesArray = getCategories($db); 
                if(!empty($categoriesArray)):
                while($categories = mysqli_fetch_assoc($categoriesArray)): ?>
        
                    <li>
                        <a href="category.php?id=<?=$categories['id']?>"><?=$categories['nombre']?></a>
                    </li>
                
                <?php endwhile; 
                endif;
                ?>
                <!--
                <li>
                    <a href="index.php">C#</a>
                </li>
                <li>
                    <a href="index.php">PHP</a>
                </li>
                <li>
                    <a href="index.php">HTML/CSS</a>
                </li>
                <li>
                    <a href="index.php">JS</a>
                </li>
                 -->
                <li>
                    <a href="index.php">Sobre mi</a>
                </li>
                <li>
                    <a href="index.php">Contacto</a>
                </li>
               
            </ul>
        </nav> 
        <div class="clearfix"></div>
    </header>    

<div id="container">
        