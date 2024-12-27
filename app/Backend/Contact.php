<?php

// require_once("./connection.php");

// $database = new Connection();
// $connection = $database->getConnection();

class Contact
{

    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $phone;

	public function __construct($id, $name, $prenom, $email, $phone)
	{
		$this->id = $id;
		$this->nom = $name;
		$this->prenom = $prenom;
		$this->email = $email;
		$this->phone = $phone;
	}

	// ==================== ID ===================
    public function setId($id)
	{
		if ($id != '') {
			$this->id = $id;
		}
	}

    public function getId()
	{
		return $this->id;
	}


	// ==================== NOM ===================
    public function setNom($nom)
	{
		if ($nom != '') {
			$this->nom = $nom;
		}
	}

    public function getNom()
	{
		return $this->nom;
	}


	// ==================== PRENOM ===================
    public function setPrenom($prenom)
	{
		if ($prenom != '') {
			$this->prenom = $prenom;
		}
	}

    public function getPrenom()
	{
		return $this->prenom;
	}


	// ==================== EMAIL ===================
    public function setEmail($email)
	{
		if ($email != '') {
			$this->email = $email;
		}
	}

    public function getEmail()
	{
		return $this->email;
	}


	// ==================== PHONE ===================
    public function setPhone($phone)
	{
		if ($phone != '') {
			$this->phone = $phone;
		}
	}

    public function getPhone()
	{
		return $this->phone;
	}

}
?>