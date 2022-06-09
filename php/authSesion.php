<?php

    class AuthSession{
        function __construct()
        {
            
        }

        function start(){
            session_start();
            if(!isset($_SESSION["username"])) {
                header("Location: registro.php");
                exit();
            }
        }
    }
    
?>
