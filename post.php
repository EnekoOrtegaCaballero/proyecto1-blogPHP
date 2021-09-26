<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>    

    <?php
        $actualPost = getPost ($db, $_GET['id']);


        if(!isset($actualPost['id'])){
            header("Location: index.php");
        }  
    ?>
        <main>   

            <h1><?=$actualPost['titulo']?></h1>
            <a href="category.php?id=<?=$actualPost['categoria_id']?>">
                <h2><?=$actualPost['categoria']?></h2>
            </a>

            <h4><?=$actualPost['fecha'] ?>, <?=$actualPost['nombreusuario']?></h4>

            <p>
                <?=$actualPost['descripcion'] ?>
            </p>

            <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $actualPost['usuario_id']): ?>
            
            <a class="button button-menu" href="editPost.php?id=<?=$actualPost['id']?>">Modificar entrada</a>
            <a class="button button-menu button-delete" href="deletePost.php?id=<?=$actualPost['id']?>">Eliminar entrada</a>
                     
            
            <?php endif; ?>

        </main> 

<?php require_once 'includes/footer.php'; ?>