<?php
include "dbconfig.php";
$id = $_GET['id'];
$query = "DELETE FROM users WHERE id = $id";
$delete = $database->prepare($query);
$delete->execute();
header('Location: index.php');
?>