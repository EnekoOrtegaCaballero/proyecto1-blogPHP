<?php require_once 'includes/header.php'; ?>

    <?php require_once 'includes/aside.php'; ?>    
    <?php
        $showCategory = getCategory ($db, $_GET['id']);

        if(!isset($showCategory['id'])){
                header("Location: index.php");
        }   
?>
        <main>   


   
            <h1>Entradas de <?= $showCategory['nombre'] ?></h1>

            <?php 
                $posts = getPosts($db, null, $_GET['id']);
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