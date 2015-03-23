<?php
require_once("DAO.php");
class Panier
{
	function __contruct()
	{
			$query = "SELECT * FROM Panier WHERE PanierID = :id";
			$stmt = $conn->prepare($query);
			$stmt->setFetchMode(PDO::FETCH_CLASS, 'Users'); 
			$stmt->execute(array(':id' => $PanierID));
			$Lignes = $stmt->fetch();
	}

	$IDClient
	$PanierID
	$Lignes
}
?>
