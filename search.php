<?php
if(!isset($_POST['search'])){
            header("Location: index.php");
        }   
require_once 'includes/header.php';

require_once 'includes/aside.php';    

?>
<main>   
    <h1>Resultados para <?= $_POST['search']?></h1>
    <?php
    $posts = getPosts($db, null , null, $_POST['search']);
    ?>

    <?php 
        if(!empty($posts)):
            while($post = mysqli_fetch_assoc($posts)) :
    ?>
    <article class="post">
        <a href="post.php?id=<?=$post['id']?>">
            <h2><?php echo ($post['titulo']); ?></h2>
            <span class="date"><?= $post['categoria'].' | '.$post['fecha']?></span>
            <p>
                <?= substr($post['descripcion'], 0 , 200).'...' ?>
            
            </p>
        </a>
    </article>
    <?php
        endwhile;
    else:
    ?>
    <div class="alert">
        No hay entradas en esta categoría.
    </div>
    <?php endif; ?>

</main> 

<?php require_once 'includes/footer.php'; ?>