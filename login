<?php
include "dbconfig.php";

if(isset($_POST['submit'])){
    $email = $_POST["email"];
    $wachtwoord = $_POST["wachtwoord"];
    //bindparam example
    $query = $database->prepare('select * from users where email = :email');
	$query->bindParam(':email', $email);
    $query->execute();

	$account = $query->fetch(PDO::FETCH_OBJ);
    if($account != NULL) {
        //Check of wachtwoord juist is
        if (password_verify($wachtwoord, $account->wachtwoord)){
            session_start();
            $_SESSION["inlog"] = 'true';
            $_SESSION["voornaam"] = $account->voornaam;
            $_SESSION["achternaam"] = $account->achternaam;
            header('Location: index.php');
            echo "Juiste inlog";
        } else {
            echo 'Onjuiste inlog';
        }
    } else {
        echo 'Onjuiste inlog';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body>
    
<h1>Login</h1>

<form method="post" action="">
    <label for="email">Email</label><br>    
    <input type="text" id="email" name="email" placeholder="email">
    <br>
    <br>
    <label for="wachtwoord">Wachtwoord</label><br>    
    <input type="password" id="wachtwoord" name="wachtwoord" placeholder="wachtwoord">
    <br><br>
    <input type="submit" name="submit" value="Login">
</form>


</body>
</html>