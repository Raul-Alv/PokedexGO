<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            require("../php/database.php");
            session_start();
        ?>
        <h1>Inicie Sesión</h1>
        <form class="formulario" action="" method="post">

            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Contraseña"><br>

            <input name="enviar" type="submit" value="Enviar"><br>
        </form>
        <?php
            require("../php/sessionStart.php");
            $session = new ConnectToSession();
            
            if (count($_POST) > 0){
                $value = $_POST['enviar'];
                echo "<p>.$value.</p>";
                if(isset($_POST['enviar'])){
                    echo "<p>Empieza el login</p>";
                    $session->login();
                    echo '<script src="../js/forms.js"></script>';
                    header("Location: listPokemon.html");
                }
            }
        ?>
        <footer>
            
        </footer>
    </body>
</html>
