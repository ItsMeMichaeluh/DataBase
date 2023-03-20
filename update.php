<?php
include "dbconfig.php";
if(isset($_POST['submit'])){
    $id = $_POST["id"];
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];

    
    
    $query = "UPDATE users SET voornaam=:voornaam, achternaam=:achternaam, email=:email WHERE id=:id";
    $insert = $database->prepare($query);
    $insert->bindParam(':voornaam', $voornaam);
    $insert->bindParam(':achternaam', $achternaam);
    $insert->bindParam(':email', $email);
    $insert->bindParam(':id', $id);
    $insert->execute();
    header('Location: index.php');
    //Insert query

}



$id = $_GET["id"];
$query = "SELECT * FROM users WHERE id = ?";


$users = $database->prepare($query);
$data = array($id);
$users->execute($data);
$row = $users->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    
<h1>Update user</h1>

<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
    <label for="voornaam">Voornaam</label><br>    
    <input type="text" id="voornaam" name="voornaam" placeholder="voornaam" value="<?php echo $row['voornaam'] ?>">
    <br>
    <label for="voornaam">Achternaam</label><br>    
    <input type="text" id="achternaam" name="achternaam" placeholder="achternaam" value="<?php echo $row['achternaam'] ?>">
    <br>
    <label for="email">Email</label><br>    
    <input type="email" id="email" name="email" placeholder="email" value="<?php echo $row['email'] ?>">
    <br><br>
    <input type="submit" name="submit" value="Opslaan">
</form>

</body>
</html>