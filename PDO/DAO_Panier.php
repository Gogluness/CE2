<?php
require_once("DAO.php");
include("objects/Panier.php");
include("objects/LignePanier.php");
class DAO_Panier extends DAO implements iMySqlDao
{
		static function GetAll(){
			$query = "SELECT * FROM Panier";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			// set the resulting array to associative
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Produit');
			return $result;
		}
		static function GetById($id){
			$query = "SELECT * FROM Produit WHERE ID = :id";
			$stmt = $conn->prepare($query);
			$stmt->execute(array(':id' => $id));;
			// set the resulting array to associative
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Produit');
			return $result;
		}
		static function GetByCup($CUP){
			$query = "SELECT * FROM Produit WHERE CUP = :CUP";
			$stmt = $conn->prepare($query);
			$stmt->execute(array(':CUP' => $CUP));;
			// set the resulting array to associative
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Produit');
			return $result;
		}
		static function Add($object)
		{
			if(is_a($object,'Produit'))
			{
				$query = "INSERT INTO Produit (`CUP`, `Description`, `ID`, `IDModele`,`ImgPath`,`Nom`,`NomCompagnie`,`PrixCout`,`PrixVente`,`Quantite`) VALUES (?,?,?,PASSWORD(?)";
				$stmt = $conn->prepare($query);
				$stmt->execute(array(
					  $object->$CUP
					, $object->$Description
					, $object->$ID
					, $object->$IDModele
					, $object->$ImgPath
					, $object->$Nom
					, $object->$NomCompagnie
					, $object->$PrixCout
					, $object->$PrixVente
					, $object->$Quantite);
			}
		}
		static function Remove($object)
		{
			if(is_a($object,'Produit'))
			{
				$query = "DELETE FROM Produit WHERE ID = ?";
				$stmt = $conn->prepare($query);
				$stmt->execute(array($object->$Email));;
				// set the resulting array to associative
			}
		}
		static function SearchByName($name){
			$query = "SELECT * FROM Produit WHERE Name LIKE ?";
			$stmt = $conn->prepare($query);
			$stmt->bindValue(1, "%$name%", PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Produit');
		}
}
?>