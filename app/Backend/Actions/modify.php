<?php

require_once("../connection.php");
require_once("../Contact.php");

$database = new Connection();
$connection = $database->getConnection();

if (isset($_POST['submitEdit'])) {
    $id = $_GET['id'] ?? null;
    var_dump($id); 

    if (!$id) {
        die("ID is missing.");
    }

    $contact = new Contact($id, $_POST['name'], $_POST['prenom'], $_POST['email'], $_POST['phone']);

    $query = "UPDATE contacts SET nom = :nom, prenom = :prenom, email = :email, phone = :phone WHERE id = :id";
    $stmt = $connection->prepare($query);

    $nom = $contact->getNom();
    $prenom = $contact->getPrenom();
    $email = $contact->getEmail();
    $phone = $contact->getPhone();

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo $stmt->rowCount() . " record(s) updated.";
        // header("location: ../../index.php");
        exit; 
    } else {
        echo "Error updating record: " . implode(", ", $stmt->errorInfo());
    }
}

?>