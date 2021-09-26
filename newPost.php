
<?php require_once 'includes/redirection.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>    



<main>   
    <h1>Crear entradas</h1>
    <p>Añade nuevas entradas al blog para que los usuarios puedan leerlas.</p>

    <form action="savePost.php" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" />
        <?php echo isset($_SESSION['errors_posts']) ? showError($_SESSION['errors_posts'], 'titulo'): '' ; ?>


        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"></textarea>
        <?php echo isset($_SESSION['errors_posts']) ? showError($_SESSION['errors_posts'], 'descripcion'): '' ; ?>

        <label for="categoria">Categoria:</label>
        <select name="categoria">
            <?php $categories = getCategories($db);
            if(!empty($categories)):
            while($category = mysqli_fetch_assoc($categories)):
            ?>
            <option value="<?=$category['id']?>">
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

<?php require_once 'includes/footer.php'; ?>


