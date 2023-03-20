<?php
include "dbconfig.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>

    <script>
        function delete1(id){
            if(confirm('Verwijderen?')){
                location.href= 'delete.php?id='+id+'';
            }
        }
        </script>
</head>
<body>


<h1>Overzicht users</h1>
<table border='1' cellpadding='10'>
<?php
//Gegevens uit een tabel op het scherm tonen
$query = "SELECT * FROM users";

$users = $database->prepare($query);
$users->execute(array());
$users->setFetchMode(PDO::FETCH_ASSOC);

foreach($users as $user){
    echo "<tr>";
    echo "<td>" .$user["id"]. "</td>";
    echo "<td>" .$user["voornaam"]. "</td>";
    echo "<td>" .$user["achternaam"]. "</td>";
    echo "<td>" .$user["email"]. "</td>";
    echo "<td><a href='update.php?id=".$user["id"]."'>Wijzigen</a></td>";
    echo "<td><a href='javascript:delete1(". $user['id'] .");'>Verwijderen</a></td>";
    echo "</tr>";
}

?>

</table>

<a href="create.php">Nieuwe gebruiker aanmaken</a>


</body>
</html>