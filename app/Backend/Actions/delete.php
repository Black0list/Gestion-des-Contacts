<?php

require_once("../connection.php");

$database = new Connection();
$connection = $database->getConnection();

$ItemToDelete =  $_GET['id'];

$query = "DELETE FROM Contacts WHERE id = ?";

$execute = $connection->prepare($query);
$execute->bindParam(1, $ItemToDelete);

try
{
    $execute->execute();
    header("location: ../../index.php");
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>