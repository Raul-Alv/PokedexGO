<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            include("../php/database.php");
        ?>
        <h1>Registro</h1>
        <form class="formulario" action="" method="post">

            <input type="text" name="name" placeholder="Nombre"><br>
            <input type="text" name="username" placeholder="Nombre de usuario"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Contraseña"><br>
            <input type="password" name="passwordRepetir" placeholder="Repetir contraseña"><br>

            <input id="enviar" type="submit" value="Enviar"><br>
        </form>
        
        <?php
            include("../php/sessionStart.php");
            $session = new ConnectToSession();
            if($count($_POST) > 0){
                if(isset($_POST['enviar']))
                    $session->register();
            }
        ?>
        <footer>
            
        </footer>
    </body>
</html>