<?php
require_once 'includes/redirection.php'; 
require_once 'includes/connection.php';
require_once 'includes/helpers.php';

    $actualPost = getPost ($db, $_GET['id']);

  

require_once 'includes/header.php'; 
require_once 'includes/aside.php';   
?>
    <main>   
    <h1>Editar entradas</h1>
    <p>Edita las entrada <?=$actualPost['titulo']?></p>

    <form action="savePost.php?editar=1" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?=$actualPost['titulo']?>"/>
        <?php echo isset($_SESSION['errors_posts']) ? showError($_SESSION['errors_posts'], 'titulo'): '' ; ?>


        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"><?=$actualPost['descripcion']?></textarea>
        <?php echo isset($_SESSION['errors_posts']) ? showError($_SESSION['errors_posts'], 'descripcion'): '' ; ?>

        <label for="categoria">Categoria:</label>
        <select name="categoria">
            <?php $categories = getCategories($db);
            if(!empty($categories)):
            while($category = mysqli_fetch_assoc($categories)):
            ?>
            <option value="<?=$category['id']?>" 
            <?=$category['id'] == $actualPost['categoria_id'] ? 'selected="selected"' : ''?>
            >  
                <?= $category ['nombre'] ?>
            </option>
            <?php endwhile;
            endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errors_posts']) ? showError($_SESSION['errors_posts'], 'categoria'): '' ; ?>
        <input type="submit" name="save" />
    </form>
    <?php deleteErrors(); ?>
</main> 

<?php 
require_once 'includes/footer.php';

?>