<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        
    </head>
    <body>
        
        <?php
            require("../php/database.php");
            include("../php/authSesion.php")
        ?>
        <h1>Registro</h1>
        <nav>
           <a href="/html/index.html" accesskey="I" tabindex=0>Inicio</a>
           <a href="/html/tablaDeTipos.html" accesskey="T" tabindex=0>Tabla de tipos</a>
           <a href="/html/mapaRegiones.html" accesskey="M" tabindex=0>Mapa de regiones</a>
           <a href="/html/login.php" accesskey="L" tabindex=0>Inicio de sesión</a>
           <a href="/html/registro.php" accesskey="R" tabindex=0>Registrarse</a>
           
        </nav>
        <form class="formulario" action="" method="post">

            <input type="text" name="name" placeholder="Nombre"><br>
            <input type="text" name="username" placeholder="Nombre de usuario"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Contraseña"><br>
            <input type="password" name="passwordRepetir" placeholder="Repetir contraseña"><br>

            <input name="enviar" type="submit" value="Enviar"><br>
        </form>
        
        <?php
            require("../php/sessionStart.php");
            $session = new ConnectToSession();
            
            if (count($_POST) > 0){
                $value = $_POST['enviar'];
                echo "<p>.$value.</p>";
                if(isset($_POST['enviar'])){
                    echo "<p>Empieza el registro</p>";
                    $session->register();
                    echo '<script src="../js/forms.js"></script>';
                }
            }
        ?>
        <footer>
            
        </footer>
    </body>
</html>