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


function checkInlog(){
    session_start();
    if($_SESSION["inlog"] != 'true'){
        header('Location: login.php');   
    }   
}


function showUserInlog(){
    echo "U bent ingelogd als: " . $_SESSION['voornaam'] . " " . $_SESSION['achternaam'];
    echo "<br /> <a href='uitloggen.php'>Uitloggen</a>";
}


?>