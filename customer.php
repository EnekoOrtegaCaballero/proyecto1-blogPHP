<?php

require_once 'includes/redirection.php'; 
require_once 'includes/header.php'; 
require_once 'includes/aside.php';    
?>

<main>
    <h1>Mis Datos</h1>

    <?php if(isset($_SESSION['savedOnDb'])): ?>
            <div class="alert alert-ok">
                <?php echo $_SESSION['savedOnDb']; ?>
            </div>
    <?php elseif(isset($_SESSION['errors'])): ?>
        <div class="alert alert-ok">
            <?= $_SESSION['errors']['general']; ?>
        </div>
        <?php endif; ?>
   
    <h3>Actualiza los datos</h3>
    <form action="updateCustomer.php" method="POST">
        <label for="name">Nombre</label>
        <input type="text" name="name"  value="<?=$_SESSION['user']['nombre']?>">    
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'name'): '' ; ?>


        <label for="surname">Apellidos</label>
        <input type="text" name="surname"  value="<?=$_SESSION['user']['apellidos']?>">         
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'surname'): '' ; ?>

    
        <label for="email">Email</label>
        <input type="email" name="email"  value="<?=$_SESSION['user']['email']?>">
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email'): '' ; ?>

        <input type="submit" name="submit" value="Actualiza"/>
    </form>
    <?php deleteErrors();?>

</main>

<?php
require_once 'includes/footer.php'; 

?>