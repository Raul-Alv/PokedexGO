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
        $this->database = "pokedexgo";
    }
    
    public function createBaseDatos(){
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $query = "CREATE DATABASE IF NOT EXISTS PokedexGO COLLATE utf8_spanish_ci";
        if($transacc->query($query) == TRUE) 
            echo "<p>Se ha creado la base de datos</p>";
        else {
            echo "<p>La base de datos ya ha sido creada</p>";
            exit();
        }
        $transacc->close();
    }
    
    public function createUsersTable(){
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);

        $query = "CREATE TABLE IF NOT EXISTS Usuarios (
            id INT NOT NULL AUTO_INCREMENT, username varchar(30) NOT NULL,
            nombre varchar(30), email varchar(30) NOT NULL, pssword(30) NOT NULL,
            PRIMARY KEY (id)
        )";
        
        if($transacc->query($query) == TRUE) 
            echo "<p>Se ha creado la tabla</p>";
        else {
            echo "<p>La tabla ya ha sido creada</p>";
            exit();
        }
    $transacc->close();
    }

    public function insertUsers(){
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $query = $transacc->prepare("INSERT INTO Usuarios (username, nombre, email, pssword) values (username='admin', nombre='admin', email='admin@admin.com', pssword='admin')");
        
        $query->execute();
        $query->close();
    
        $transacc->close();
    }
}

$base = new BaseDatos();
$base->createBaseDatos();
$base->createUsersTable();
$base->insertUsers();
?>
