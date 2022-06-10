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

    public function createPokemonTable(){
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if($transacc === false)
            die("ERROR: Could not connect. " . mysqli_connect_error());

        $query = "CREATE TABLE IF NOT EXISTS pokemon (
            pokedex_num INT NOT NULL, 
            nombre varchar(30) NOT NULL,
            tipo1 varchar(30) NOT NULL, 
            tipo2 varchar(30), 
            generacion INT NOT NULL,
            pre_evolution varchar(30),
            evolution varchar(30),
            PRIMARY KEY (pokedex_num)
        )";
        
        if($transacc->query($query) === TRUE) 
            echo "<p>Se ha creado la tabla</p>";
        else {
            echo "<p>La tabla ya ha sido creada".$transacc->error."</p>";
            exit();
        }
        $transacc->close();
    }

    public function createPokemonSelectedTable(){
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if($transacc === false)
            die("ERROR: Could not connect. " . mysqli_connect_error());

        $query = "CREATE TABLE IF NOT EXISTS pokemon_seleccionados (
            id INT NOT NULL AUTO_INCREMENT, 
            username varchar(30) NOT NULL,
            pokedex_num INT NOT NULL, 
            PRIMARY KEY (id),
            CONSTRAINT fk_seleccionados_pokemon FOREIGN KEY (pokedex_num) REFERENCES pokemon(pokedex_num)
        )";

        $alter = "ALTER TABLE pokemon_seleccionados ADD CONSTRAINT fk_seleccionados_usuario FOREIGN KEY (username) REFERENCES usuarios(username)";
        $transacc->query($query);
        $transacc->query($alter);
        if($transacc->query($query) === TRUE) 
            echo "<p>Se ha creado la tabla</p>";
        else {
            echo "<p>La tabla ya ha sido creada".$transacc->error."</p>";
            exit();
        }
        $transacc->close();
    }

    public function createLocationTable(){
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if($transacc === false)
            die("ERROR: Could not connect. " . mysqli_connect_error());

        $query = "CREATE TABLE IF NOT EXISTS localizaciones (
            id INT NOT NULL AUTO_INCREMENT, 
            nombre varchar(30) NOT NULL,
            pokedex_num INT NOT NULL, 
            PRIMARY KEY (id),
            FOREIGN KEY (pokedex_num) REFERENCES pokemon (pokedex_num)
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
    public function insertPokemon(){
        $transacc = new mysqli($this->servername, $this->username, $this->password, $this->database);
        $xmlFile = simplexml_load_file("../xml/pokedex.xml") or die("Error. cannot create");
        
        
        //echo "<p>Aa</p>".$xmlFile->asXML()."<br>";
        echo $xmlFile->count();
        for($i = 0; $i < $xmlFile->count(); $i++){
            $numPokedex = $xmlFile->pokemon[$i]['number'];
            $nombre = $xmlFile->pokemon[$i]->nombre;
            $tipo1 = $xmlFile->pokemon[$i]->tipo1;
            $tipo2 = $xmlFile->pokemon[$i]->tipo2;
            $localizacion = $xmlFile->pokemon[$i]->localizacion;
            $generacion = $xmlFile->pokemon[$i]->generacion;
            echo "<p>hay ".$nombre."</p>";
            if(!empty($xmlFile->pokemon[$i]->pokemon)){
                $numPokedex_2 = $xmlFile->pokemon[$i]->pokemon['number'];
                $nombre_2 = $xmlFile->pokemon[$i]->pokemon->nombre;
                $tipo1_2 = $xmlFile->pokemon[$i]->pokemon->tipo1;
                $tipo2_2 = $xmlFile->pokemon[$i]->pokemon->tipo2;
                $localizacion_2 = $xmlFile->pokemon[$i]->pokemon->localizacion;
                $generacion_2 = $xmlFile->pokemon[$i]->pokemon->generacion;
                
                echo "<p>hay ".$nombre_2."</p>";
                
                
                if(!empty($xmlFile->pokemon[$i]->pokemon->pokemon)){
                    
                    $numPokedex_3 = $xmlFile->pokemon[$i]->pokemon->pokemon['number'];
                    $nombre_3 = $xmlFile->pokemon[$i]->pokemon->pokemon->nombre;
                    $tipo1_3 = $xmlFile->pokemon[$i]->pokemon->pokemon->tipo1;
                    $tipo2_3 = $xmlFile->pokemon[$i]->pokemon->pokemon->tipo2;
                    $localizacion_3 = $xmlFile->pokemon[$i]->pokemon->pokemon->localizacion;
                    $generacion_3 = $xmlFile->pokemon[$i]->pokemon->pokemon->generacion;
                    echo "<p>hay ".$nombre_3."</p>";
                }
            }
            $query_1=$transacc->prepare("INSERT INTO pokemon (pokedex_num, nombre, tipo1, tipo2, generacion, pre_evolution, evolution) values ('$numPokedex', '$nombre', '$tipo1', '$tipo2', '$generacion', NULL, '$nombre_2')");
            $query_1->execute();

            $query_2=$transacc->prepare("INSERT INTO pokemon (pokedex_num, nombre, tipo1, tipo2, generacion, pre_evolution, evolution) values ('$numPokedex_2', '$nombre_2', '$tipo1_2', '$tipo2_2', '$generacion_2', '$nombre' , '$nombre_3')");
            $query_2->execute();
            
            $query_3=$transacc->prepare("INSERT INTO pokemon (pokedex_num, nombre, tipo1, tipo2, generacion, pre_evolution, evolution) values ('$numPokedex_3', '$nombre_3', '$tipo1_3', '$tipo2_3', '$generacion_3', '$nombre_2' , NULL)");
            $query_3->execute();
            
            $query_1->close();
            $query_2->close();
            $query_3->close();

            
        }
        $transacc->close();
        
    }
}

$base = new BaseDatos();
$base->createBaseDatos();
$base->createUsersTable();
$base->createPokemonTable();
$base->createPokemonSelectedTable();
$base->createLocationTable();
$base->insertUsers();
if(!isset($_SESSION['done'])){
    $_SESSION['done'] = 'done';
    $base->insertPokemon();
}
?>
