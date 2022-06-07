<?php
    class ConnectToSession {

        private $servername;
        private $mainusername;
        private $mainpassword;
        private $database;

        private $con;

        public function __construct()
        {
            $this->servername = "localhost";
            $this->mainusername = "DBUSER2021";
            $this->mainpassword = "DBPSWD2021";
            $this->database = "PokedexGO";
            $this->con = mysqli_connect($this->servername, $this->mainusername, $this->mainpassword, $this->database);
        }

        public function login(){
            if(isset($_REQUEST['email'])){
                $email = stripslashes($_REQUEST['email']);
                $email = mysqli_real_escape_string($this->con, $this->mainpassword);

                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($this->con, $this->mainpassword);

                $query = "SELECT * FROM Usuarios WHERE email='$email' AND pssword='".md5($password)."'";

                if($this->con->query($query) == TRUE){
                    $result = mysqli_query($this->con, $query);
                    $rows = mysqli_num_rows($result);
                    if($rows == 1){
                        $_SESSION['username'] = $email;
                    }
                }
                
            }
        }

        public function register(){

            $name = stripslashes($_REQUEST['nombre']);
            $name = mysqli_real_escape_string($this->con, $name);

            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($this->con, $username);

            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($this->con, $email);

            $password = stripslashes($_REQUEST['pssword']);
            $password = mysqli_real_escape_string($this->con, $password);
            
            $query = "INSERT INTO Usuarios (username, nombre, email, pssword) values (username='$username', nombre='$name', email='$email', pssword='$password')";
            $result = mysqli_query($this->con, $query);
            
            if($result) {
                echo '<p>Sesion registrada</p>';
            }
        }
    }
?>