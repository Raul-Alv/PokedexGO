<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Pokédex</title>
        <script src="../js/readPokemon.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <h1>Pokédex</h1>
        <nav>
            <a href="/html/index.html" accesskey="I" tabindex=0>Inicio</a>
            <a href="/html/tablaDeTipos.html" accesskey="T" tabindex=0>Tabla de tipos</a>
            <a href="/html/mapaRegiones.html" accesskey="M" tabindex=0>Mapa de regiones</a>
            <a href="/html/login.php" accesskey="L" tabindex=0>Inicio de sesión</a>
            <a href="/html/registro.php" accesskey="R" tabindex=0>Registrarse</a>
            
         </nav>
        <button onclick ="reader.showAlgo()">Mostrar</button>
        <pre id="texto"></pre>
    </body>
</html>