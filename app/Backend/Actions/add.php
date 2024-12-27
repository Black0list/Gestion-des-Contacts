<?php

require_once("../connection.php");
require_once("../Contact.php");

$database = new Connection();
$connection = $database->getConnection();

if(isset($_POST['submit'])){

    $contact = new Contact(NULL, $_POST['name'], $_POST['prenom'], $_POST['email'], $_POST['phone']);

	$id = $contact->getId();
	$nom = $contact->getNom();
	$prenom = $contact->getPrenom();
	$email = $contact->getEmail();
	$phone = $contact->getPhone();

	// echo $contact->getId() . $contact->getNom() . $contact->getPrenom() . $contact->getEmail() . $contact->getPhone() . "INSERTED";

	$query = "INSERT INTO Contacts(id, nom, prenom, email, phone) VALUES(?, ?, ?, ?, ?)";
	$executed = $connection->prepare($query);
	
	$executed->bindParam(1, $id);
    $executed->bindParam(2, $nom);
    $executed->bindParam(3, $prenom);
    $executed->bindParam(4, $email);
    $executed->bindParam(5, $phone);

	if($executed->execute()){
		header("location: ../../index.php");
	}
} 

?>