<?php
//Stap 1: Maak connectie met je database
$dbhost = "localhost";
$dbname = "crud";
$user = "root";
$pass = "";
try {
    $database = new PDO("mysql:host=$dbhost;dbname=$dbname",$user,$pass);
    $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>