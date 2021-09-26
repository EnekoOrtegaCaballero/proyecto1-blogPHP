
<aside id="sidebar">
    
    <?php if(isset($_SESSION['user'])): ?>
    <div id="loged-user" class="block-aside">
        <h3><?= "Bienvenido, ".$_SESSION['user']['nombre'].' '.$_SESSION['user']['apellidos'] ?></h3>
        <!-- botones -->
        <?php if(isset($_SESSION['user'])){
        echo '<a class="button button-menu" href="newPost.php">Crear entradas</a>';
        echo '<a class="button button-menu" href="customer.php">Mis Datos</a>';
        echo '<a class="button button-menu" href="newCategory.php">Crear Categoria</a>';  
        echo '<a class="button button-menu" href="close.php">Cerrar sesión</a>';

        }
        ?>
    </div>    
    <?php endif; ?>
    
    <div id="search" class="block-aside">
        <h3>Buscar</h3>

        <form action="search.php" method="POST">
            <input type="text" name="search">   
            <input type="submit" value="Entrar"/>
        </form>
    </div>
    

    <?php if(!isset($_SESSION['user'])): ?>
    <div class="block-aside">
        <h3>Login</h3>
        <?php if(isset($_SESSION['error_login'])): ?>
        <div id="loged-user" class="alert alert-error">
            <?= $_SESSION['error_login'] ?>
        </div>    
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email">

            <label for="password">Contraseña</label>
            <input type="text" name="password">  
            
            <input type="submit" value="Entrar"/>
        </form>
    </div>
    <div class="block-aside">
        <!-- Show errors -->
        <?php
            if(isset($_SESSION['savedOnDb'])):
        ?>
                <div class="alert alert-ok">
                <?php echo $_SESSION['savedOnDb']; ?>
                </div>
        <?php
                elseif(isset($_SESSION['errors'])): 
                $_SESSION['errors']['general'];
                endif;
        ?>
    <?php endif; ?>
    <?php if(!isset($_SESSION['user'])): ?>
        <h3>Register</h3>
        <form action="register.php" method="POST">
            <label for="name">Nombre</label>
            <input type="text" name="name">    
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'name'): '' ; ?>


            <label for="surname">Apellidos</label>
            <input type="text" name="surname">          
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'surname'): '' ; ?>

        
            <label for="email">Email</label>
            <input type="email" name="email"> 
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email'): '' ; ?>


            <label for="password">Contraseña</label>
            <input type="password" name="password">  
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'password'): '' ; ?>

            <input type="submit" name="submit" value="enter"/>
        </form>
        <?php deleteErrors(); ?>
    </div>
    <?php endif; ?>
</aside>
