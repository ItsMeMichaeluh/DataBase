<?php
include "dbconfig.php";

if(isset($_POST['submit'])){
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];

    //Wachtwoord encrypten
    $hash = password_hash($wachtwoord, PASSWORD_BCRYPT);

    //bindparam example
    $query = "INSERT INTO users (voornaam, achternaam, email, wachtwoord) values (:voornaam, :achternaam, :email, :wachtwoord)";
    $insert = $database->prepare($query);
    $insert->bindParam(':voornaam', $voornaam);
    $insert->bindParam(':achternaam', $achternaam);
    $insert->bindParam(':email', $email);
    $insert->bindParam(':wachtwoord', $hash);
    $insert->execute();
	
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    
<h1>Create user</h1>



<form method="post" action="">
    <label for="voornaam">Voornaam</label><br>    
    <input type="text" id="voornaam" name="voornaam" placeholder="voornaam">
    <br>
    <label for="voornaam">Achternaam</label><br>    
    <input type="text" id="achternaam" name="achternaam" placeholder="achternaam">
    <br>
    <label for="email">Email</label><br>    
    <input type="email" id="email" name="email" placeholder="email">
    <br>
    <label for="wachtwoord">Wachtwoord</label><br>    
    <input type="password" id="wachtwoord" name="wachtwoord" placeholder="wachtwoord">

    <br><br>
    <input type="submit" name="submit" value="Opslaan">
</form>

</body>
</html>