<?php
require_once("DAO.php");
class Facture
{
	function __contruct()
	{
		$query = "SELECT * FROM Facture WHERE NoFacture = :id";
		$stmt = $conn->prepare($query);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'LigneFacture'); 
		$stmt->execute(array(':id' => $NoFacture));
		$Lignes = $stmt->fetch();
	}

	$NoFacture
	$BillingAdress
	$ShippingAdress
	$BillingAdressID
	$ShippingAdressID
	$Client
	$Date
	$Lignes
	$QteTotal
}
?>