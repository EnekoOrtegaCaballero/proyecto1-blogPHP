<?php require_once 'includes/redirection.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>    



<main>   
    <h1>Crear categorias</h1>
    <p>Añade nuevas categorias al blog para que los usuarios puedan usarlas al crear sus entradas.</p>

    <form action="saveCategory.php" method="POST">
        <label for="name">Nombre</label>
        <input type="text" name="name" />

        <input type="submit" name="save" />

    </form>



</main> 

<?php require_once 'includes/footer.php'; ?>


