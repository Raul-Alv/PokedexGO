<?php

class BaseDatos{
    private $servername;
    private $username;
    private $password;
    private $database;

    public function __construct(){
        $this->servername = "localhost";
        $this->username = "DBUSER2021";
        $this->password = "DBPSWD2021";
        $this->database = "PokedexGO";
        $this->addAdmin = false;

    }
    
    public function createBaseDatos(){
        $transacc = new mysqli($this->servername, $this->username, $this->password);
        if($transacc->connect_error){
            exit("<p>Error de conexión:".$transacc->connect_error."</p>");
        }

        $query = "CREATE DATABASE IF NOT EXISTS pokedexgo COLLATE utf8_spanish_ci";

        
        if($transacc->query($query) === TRUE) 
            echo "<p>Se ha creado la base de datos</p>";
        else {
            echo "<p>La base de datos ya ha sido creada</p>";
            exit();
        }

        $transacc->close();

    }
    
    public function createUsersTable(){
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if($transacc === false)
            die("ERROR: Could not connect. " . mysqli_connect_error());

        $query = "CREATE TABLE IF NOT EXISTS usuarios (
            id INT NOT NULL AUTO_INCREMENT, 
            username varchar(30) NOT NULL,
            nombre varchar(30), 
            email varchar(30) NOT NULL, 
            pssword varchar(30) NOT NULL,
            PRIMARY KEY (id)
        )";
        
        if($transacc->query($query) === TRUE) 
            echo "<p>Se ha creado la tabla</p>";
        else {
            echo "<p>La tabla ya ha sido creada".$transacc->error."</p>";
            exit();
        }
        $transacc->close();
    }

    public function insertUsers(){
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $query = $transacc->prepare("INSERT INTO Usuarios (username, nombre, email, pssword) values ('admin', 'admin', 'admin@admin.com', 'admin')");
        $buscar = $transacc->query("SELECT COUNT(*) AS total FROM usuarios");
        
        while($row = $buscar->fetch_assoc()){
            echo "<p>".$row['total']."</p>";
            if($row['total'] <= 0)
            {
                $query->execute();
                echo "<p>".$row['total']."</p>";
                $query->close();
            }
        }
        $transacc->close();
    }
}

$base = new BaseDatos();
$base->createBaseDatos();
$base->createUsersTable();
$base->insertUsers();
?>
