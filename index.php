<?php require_once 'includes/header.php'; ?>

    <?php require_once 'includes/aside.php'; ?>    

        <main>   
            <h1>Ultimas entradas</h1>

            <?php 
                $posts = getPosts($db, 4);
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
            endif;
            ?>
            <div id="view-all" class="button">
                <a href="posts.php">Ver todas las entradas</a>
            </div>
        </main> 

<?php require_once 'includes/footer.php'; ?>